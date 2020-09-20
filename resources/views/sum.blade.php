<h1>Addition</h1>
<form method="post" action="+">
    @csrf
    <p>value1<input type="text" name="T1"></p>
    <p>value2<input type="text" name="T2"></p>
    <p><input type="submit" name="B1"></p>
</form>
@if($ans)
    <h2>The Result is : {{$ans}}</h2>
@endif