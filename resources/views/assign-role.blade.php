@extends('layouts.app')

@section('content')
    <div class="container">
        <section>
            <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Users</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover text-center">
                          <thead>
                          <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                              @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->hasRole('admin'))
                                        Admin
                                        @elseif ($user->hasRole('writer'))
                                        Writer
                                        @elseif ($user->hasRole('editor'))
                                        Editor
                                        @else
                                        User
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('user.edit',compact('user'))}}" class="btn btn-success">View</a>
                                    </td>
                                </tr>
                              @endforeach
                          </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12 float-left">
                                <a href="{{route('home')}}" class="btn btn-info">Home</a>
                            </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div><!-- /.card -->
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
        </section>
        <!-- /.content -->
    </div>
    @if (Session::has('user_updated'))
        <script>
            toastr.options = {
                "positionClass": "toast-bottom-left"
            }
            toastr.info("{!! Session::get('user_updated') !!}")
        </script>
        {{session()->forget('user_updated')}}
    @endif
@endsection


