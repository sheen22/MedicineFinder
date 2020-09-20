<h1>Subtract Numbers</h1>
<form method="post" action="sub">
    @csrf
    <p>value1<input type="text" name="T1"></p>
    <p>value2<input type="text" name="T2"></p>
    <p><input type="submit" name="B1" value="sub"></p>

</form>
@if($ans)
    <h2>The result is:{{$ans}}</h2>
@endif