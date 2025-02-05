@extends('layouts.app')

@section('template_title')
    Medical Control
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Medical Control') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('medical-controls.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Name Doctor</th>
										<th>Rol Doctor</th>
										<th>Date Control</th>
										<th>Observations</th>
										<th>Id Person Fk</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicalControls as $medicalControl)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $medicalControl->NAME_DOCTOR }}</td>
											<td>{{ $medicalControl->ROL_DOCTOR }}</td>
											<td>{{ $medicalControl->DATE_CONTROL }}</td>
											<td>{{ $medicalControl->OBSERVATIONS }}</td>
											<td>{{ $medicalControl->ID_PERSON_FK }}</td>

                                            <td>
                                                <form action="{{ route('medical-controls.destroy',$medicalControl->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('medical-controls.show',$medicalControl->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('medical-controls.edit',$medicalControl->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $medicalControls->links() !!}
            </div>
        </div>
    </div>
@endsection
