<table class="table table-bordered table-striped">
    <tr>
        <th>Student Name</th>
        <td>{{$item->student->first_name." ".$item->student->last_name}}</td>
        <th>Mathematics</th>
        <td>{{$item->Mathematics}}</td>
    </tr>

    <tr>
        <th>English</th>
        <td>{{$item->English}}</td>
        <th>Kiswahili</th>
        <td>{{$item->Kiswahili}}</td>
    </tr>

    <tr>
        <th>Science&Technology</th>
        <td>{{$item->Science_and_Technology}}</td>
        <th>Civics&Moral</th>
        <td>{{$item->Civics_and_Moral}}</td>
    </tr>

    <tr>
        <th>Social Studies</th>
        <td>{{$item->Social_Studies}}</td>
        <th>Vocational Skills</th>
        <td>{{$item->Vocational_Skills}}</td>
    </tr>
</table>


