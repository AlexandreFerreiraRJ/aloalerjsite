<div class="card-header">
    {{ __('Protocolos') }}

    <a id="buttonAndamentos"
       href="{{ route('records.create',['person_id'=>$person->id]) }}"
       class="btn btn-primary btn-sm pull-right"
    >
        <i class="fa fa-plus"></i>
        Novo Protocolo
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table id="recordsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Protocolos</th>
                    <th>Assuntos</th>
                    <th>Comissão</th>
                    <th>Tipo de Protocolo</th>
                    <th>Área</th>
                </tr>
            </thead>

            @forelse ($records as $record)
                <tr>
                    <td><a href="{{ route('records.show',['id' => $record->id]) }}">{{ $record->protocol }}</a></td>
                    <td>{{ $record->subject }}</td>
                    <td>{{ $record->committee->name }}</td>
                    <td>{{ $record->recordType->name }}</td>
                    <td>{{ $record->area->name }}</td>
                </tr>
            @empty
                <p>Nenhumo Protocolo encontrada</p>
            @endforelse
        </table>
    </div>
</div>