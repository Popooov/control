<h3>
    {{ $absence->user->name }} 
</h3>
<p>
    ha añadido la ausencia para la fecha: {{ $absence->date }}
</p>
@if (!empty($absence->comment))
    <p>con motivo: {{ $absence->commnet }}</p>
@endif