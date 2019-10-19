@extends('admin.layouts.app')



@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-body">
                <form action="{{route('buffer_postings.index')}}" method="GET">
                    <div class="row" style="margin:20px">
                        <div class="col-md-3">
                            <input type="text" name="search" />
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="date" />
                        </div>
                        <div class="col-md-3">
                            <select name="group">
                                <option value="">All Group</option>
                                @foreach($groups as $group)
                                    <option value="{{$group->name}}">{{$group->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="send" />
                        </div> 
                    </div>
                </form>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Group Name</th>
                            <th scope="col">Group Type</th>
                            <th scope="col">Acount Name</th>
                            <th scope="col">Post Text</th>
                            <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buffers as $buffer)
                            <tr>
                            <th scope="row">{{$buffer->groupInfo['name']}}</th>
                            <th scope="row">{{$buffer->groupInfo['type']}}</th>
                            <th scope="row">
                                <div style="position:relative; height:100px; width:100px;">
                                    <img src="{{$buffer->accountInfo['avatar']}}" style="border-radius:50%; height:100px; width:100px"  />
                                    <div style="position:absolute; height:30px;width:30px; display: flex;
                                    align-items: center;
                                    justify-content: center; top:5px; right:5px; border:2px solid #fff; border-radius:50%; background-color:blue;color:#fff">
                                        <i class="fa fa-{{$buffer->accountInfo['type']}}" aria-hidden="true"></i>
                                        
                                    </div>
                                </div>
                            </th>
                            <td>{{$buffer->post_text}}</td>
                            <td>{{ date('l jS \of F Y h:i A', strtotime($buffer->sent_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection
