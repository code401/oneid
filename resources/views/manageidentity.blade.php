@extends('layouts.app')

@section('content')


    <div class="table-title">
        <div class="row">
            <div>
                <h2>Manage <b>your connections</b></h2>
            </div>
            <div class="col-sm-8">
                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Identity</span></a>

            </div>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>


            <th>No.</th>
            <th>Type</th>
            <th>Connection</th>

            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        <p hidden>{{$i=0}}</p>
        @foreach($data as $key => $value)

            <tr >

                <td id="" >{{++$i}}</td>

                <td>{{$value->type}}</td>
                <td id="" >{{$value->data}}</td>

                <td>
                    <a href="#editEmployeeModal" class="edit" onclick="sendupdateid(this.id);" id="{{$value->id}}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#deleteEmployeeModal" onclick="sendid(this.id);" id="{{$value->id}}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
            </tr>

        @endforeach

        {{ $data->links() }}
        </tbody>

    </table>



    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  method="post"  action="{{ url('add') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add connection</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="sel1">Select connection type:</label>
                            <select name="connectiontype" class="form-control" id="sel1">
                                <option>Email</option>
                                <option>Mobile number</option>
                                <option>Facebook</option>
                                <option>Twitter</option>
                                <option>Linkedin</option>
                                <option>Whatsapp</option>
                                <option>Instragram</option>
                                <option>Skype</option>

                            </select>
                        </div>

                        <div class="form-group">

                            <input type="text" name="connectiondata" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  method="post"  action="{{ url('update') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Update connection</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">


                        <script>
                            function sendupdateid(clicked_id){



                                document.getElementById("dataupdateid").value = clicked_id;

                            }


                        </script>


                        <div class="form-group">
                            <label>New Connection value</label>
                            <input type="text" class="form-control" id="updatephone" name="newdata" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="hidden" id="dataupdateid" name="id"/>
                        <input type="submit" class="btn btn-info" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  method="post"  action="{{ url('delete') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Delete connection</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <script>
                            function sendid(clicked_id){


                                document.getElementById("dataid").value = clicked_id;


                            }


                        </script>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete?</p>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="hidden" id="dataid" name="id"/>
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>




@endsection
