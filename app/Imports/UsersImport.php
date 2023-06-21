<?php

namespace App\Imports;

use App\User;
use App\Models\Club;
use App\Models\Organization;
use App\Models\Country;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;

class UsersImport implements ToCollection,WithStartRow,WithHeadingRow,WithValidation
{
    use Importable;
    public function rules(): array
    {
    return [
        'firstname'             => 'required',
        'lastname'             => 'required',
        'gender'              => 'required',
        'email'            => 'nullable|distinct|sometimes|unique:users,email',
        'dob'              => 'required|regex:/^([0-9]{4})[.]([0-9]{2})[.]([0-9]{2})/',
        'country'    => 'required',
        'organization'          => 'required',
        'club'             => 'required',
        'password'          => 'required',
 
    ];
 
    }
    
    public function customValidationMessages()
    {
    return [
                'email.unique'      => 'The  email has already been taken',
 
                'firstname.required'               => 'First Name must not be empty!',
                'lastname.required'               => 'Last Name must not be empty!',
                'dob.required'                         => 'Date of Birth must not be empty!',
                'dob.regex'                         => 'Date of Birth format is invalid',
                'gender.required'                => 'Select the Gender',
                'country.required'               => 'Select the Country',
                'organization.required'            => 'Select the Organization',
                'club.required'            => 'Select the Club',               
       ];
  }
 
     /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
   public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
        $user = new User;
        $user->first_name = $row['firstname'];
        $user->last_name = $row['lastname'];
        $user->email = $row['email'];
        $user->tel_number = $row['mobile'];
        $user->dob = $row['dob'];
        $user->password=Hash::make($row['password']);
      $user->is_approved=1;
      $user->status=2;
if(isset($row['sil_member'])){
      $user->member_or_not=$row['sil_member']=='No'? '0':'1';
}
        $country=Country::where('name',$row['country'])->first()->id;
        $gender=$row['gender']=='Male'?'male':'female';
        $org=$row['organization']?Organization::where('name',$row['organization'])->first()->id:null;
        $club=$row['club']?Club::where('club_name',$row['club'])->first()->id:null;
        $user->country_id=$country;
        $user->gender=$gender;
        $user->organization_id=$org;
        $user->club_id=$club;
        $users = User::where('club_id', $club)->orderBy('id', 'desc')->get();
        $clb = club::find($club);
        $userIds=array();
            foreach($users as $user1){
                $userIds[]=explode(' ',$user1->userId)[1];
            }
            // dd($userIds);
           if ($users->count()>0) {
                           $max=max($userIds);
                $pre =$max;
                $user->userId = $clb->prefix  . " ". str_pad(($pre + 1), 4, '0', STR_PAD_LEFT);
            } else {
                $user->userId = $clb->prefix  . " ". str_pad(1, 4, '0', STR_PAD_LEFT);
            }
        $user->save();
        $user->assignRole(7);
    }
    }
    public function startRow(): int
{
    return 2;
}
}
