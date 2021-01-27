    <div class="card">
        <div class="card-header"><b>Banca</b></div>
        <div class="card-body form-group">
            @include('agendamentos.bancas.partials.form')
            <table class="table table-striped" style="text-align: center;">
                <theader>
                    <tr>
                        <th>Nº USP</th>
                        <th>Nome</th>
                        <th>Presidente</th>
                        <th>Ações</th>
                    </tr>
                </theader>
                <tbody>
                @foreach ($agendamento->bancas as $banca)
                    <tr>
                        <td>{{ $banca->codpes }}</td>
                        <td>{{ $banca->nome }}</td>
                        <td>{{ $banca->presidente }}</td>
                        <td>
                            <form method="POST" class="form-group" action="/bancas/{{$banca->id}}">
                                @csrf 
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Você tem certeza que deseja apagar?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
 
 