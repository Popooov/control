<h3>
    {{ $absence->user->first_name }} {{ $absence->user->last_name }}
</h3>
<p>
    ha añadido la ausencia para la fecha: {{ $absence->date }}
</p>
@if (!empty($absence->comment))
    <p>con motivo: {{ $absence->comment }}</p>
@endif