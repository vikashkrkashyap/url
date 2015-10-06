<div style="margin:5% 25%;padding:25px 20px;">
    <p style="font-size:50px;color:tomato;margin:15% 35%;font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;">Ucut.in</p>
    <form method="post" action="{{url('show')}}">
        {!! csrf_field() !!}
        <input type="url" name ="input_data"placeholder="Enter Your link" required ="required"
               style="width:70%;height:50px;border:2px solid tomato;font-size:15px;font-weight:500;padding:8px 5px;border-radius:2px; ">
        <input type="submit" value="Cut Link"
               style="width:150px;height:50px;margin:2% auto;padding:5px 3px;background:tomato;color:white;
               border:2px solid tomato;font-size:15px;font-weight: 600;">
    </form>
</div>