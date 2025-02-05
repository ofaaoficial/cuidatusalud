@extends('layouts.app')

@section('template_title')
    Person
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Person') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('people.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name Person</th>
										<th>Last Name Person</th>
										<th>Gender</th>
										<th>Age</th>
										<th>Id User Fk</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($people as $person)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $person->NAME_PERSON }}</td>
											<td>{{ $person->LAST_NAME_PERSON }}</td>
											<td>{{ $person->GENDER }}</td>
											<td>{{ $person->AGE }}</td>
											<td>{{ $person->ID_USER_FK }}</td>

                                            <td>
                                                <form action="{{ route('people.destroy',$person->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('people.show',$person->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('people.edit',$person->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $people->links() !!}
            </div>
        </div>
    </div>
@endsection
