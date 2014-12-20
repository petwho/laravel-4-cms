@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h3>Messages</h3>
            <table class="table table-striped table-bordered" style="margin-top: 5px;">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Content</th>
                      <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($messages))
                        <?php $i = 1; ?>
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$message->fullname}}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->phone}}</td>
                                <td>{{$message->content}}</td>
                                <td>{{$message->created_at}}</td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    @else
                        <tr>
                          <td colspan="5">No message found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop