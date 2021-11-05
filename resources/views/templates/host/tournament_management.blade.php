@extends('templates.host.main')

@section('tournament')

    <div>
        <h1 style="padding: 20px 0px;">Tournament Management</h1>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="btn btn-success">
        <a class="text-decoration-none text-white" href="{{route('tournament.create')}}" >Add Tournament</a>
    </div>

    <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
        <table class="table my-0" id="dataTable">
            <thead>
                <tr>
                    <th></th>
                    <th>Tournament Name</th>
                    <th>Sport / E-Sport</th>
                    <th>Sport Type</th>
                    <th>Bracket Type</th>
                    <th>Starting Date</th>
                    <th>Date Created<br></th>
                    <th><br><br></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($tournaments as $tournament)
                    <tr>

                        <td>{{ ++$i }}</td>
                        <td>{{ $tournament->tournament_name }}</td>
                        <td>{{ $tournament->tournament_sport }}</td>
                        <td>{{ $tournament->tournament_sport_type }}</td>
                        <td>{{ $tournament->tournament_bracket }}</td>
                        <td>{{ $tournament->tournament_date }}</td>
                        <td>{{ $tournament->tournament_fee }}</td>
                        <td>
                            <form action="{{ route('tournament.destroy',$tournament->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('tournament.show',$tournament->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('tournament.edit',$tournament->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td><br></td>
                    <td><strong>Tournament Name</strong></td>
                    <td><strong>Tournament Type</strong></td>
                    <td><strong>Sport Type</strong></td>
                    <td style="text-align: left;"><strong style="text-align: center;">No. of Teams<br></strong></td>
                    <td><strong style="text-align: left;">Date Created<br></strong></td>
                    <td><strong>Starting Date<br></strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        {!! $tournaments->links() !!}
    </div>

@endsection


