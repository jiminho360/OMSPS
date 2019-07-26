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
        <th>Science</th>
        <td>{{$item->Science}}</td>
        <th>ICT</th>
        <td>{{$item->Civics_and_Moral}}</td>
    </tr>

    <tr>
        <th>PDS</th>
        <td>{{$item->Social_Studies}}</td>
        <th>History</th>
        <td>{{$item->Vocational_Skills}}</td>
    </tr>
    <tr>
        <th>Geography</th>
        <td>{{$item->Social_Studies}}</td>
        <th>Civics</th>
        <td>{{$item->Vocational_Skills}}</td>
    </tr>
</table>


