<div style="margin:17% 25%;padding:25px 20px;">
    <form method="post" action="{{url('show')}}">
        {!! csrf_field() !!}
        <input type="url" name ="input_data"placeholder="Enter Your link" required ="required"
               style="width:450px;height:50px;border:2px solid teal;font-size:20px;font-weight:700;padding:8px 5px;border-radius:2px; ">
        <input type="submit" value="Generate Link"
               style="width:150px;height:50px;margin:5% auto;padding:5px;background:teal;color:white;font-size:18px;font-weight: 600;">
    </form>
</div>