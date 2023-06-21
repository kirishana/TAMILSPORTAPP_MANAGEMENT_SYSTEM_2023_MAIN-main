<form action="/single-event-payment/edit" method="POST">
    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
    <input type="hidden" name="method" value="stripe">
    <input type="hidden" name="invNo" value="{{ $invNo}}" />
                @if($regs)
                    @foreach ( $regs as $reg)
                    <input type="hidden" name="regs[]" value="{{ $reg }}">
                    @endforeach
                    @endif
                @endif
</form>     