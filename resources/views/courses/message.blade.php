@if($message->sender_id == $otherUserId)
    <div class="col-sm-6 p-4 mt-2" style="background-color: pink; color: #fff; border-radius: 15px">
        <p>{{ $message->message }}</p>
    </div>
@else
    <div class="col-sm-6 p-4 mt-2" style="background-color: #DBDBDB; color: #fff; margin-left: 620px; border-radius: 15px">
        <p>{{ $message->message }}</p>
        <small style="color: white; float: right">{{ $message->created_at->diffForHumans() }}</small>
    </div>
@endif
