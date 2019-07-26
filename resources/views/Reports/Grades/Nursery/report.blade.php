<style>
    td {
        padding: 4px;
    }
    .centered{
        text-align: center;
    }
</style>

<img src="{{asset('asset/images/logo.png')}}" style="margin-left: 22%; font-size: large">

<table style="width: 105%;border-collapse: collapse" border="1">
    <tr>
        <td>Type of Examination: <span style="color: red; font-weight: bolder">MID TERM EXAMINATION</span></td>
        <td>Month & Year: <span style="color: red; font-weight: bolder">{{date('M Y')}}</span></td>
    </tr>
    <tr>
        <td>Pupils Full Name: <span style="color: red; font-weight: bolder">{{$student->first_name." ".$student->last_name." ".$student->surname}}</span></td>
        <td>Admission Year: <span style="color: red; font-weight: bolder">{{$student->admission_year}}</span></td>    </tr>
    <tr>
        <td>Class: <span style="color: red; font-weight: bolder">Nursery</span></td>
      @php  $currentYear = date('Y'); @endphp
        <td>Number of Pupils in a class: <span style="color: red; font-weight: bolder">{{count(\App\models\Student::getStudents($currentYear))}}</span></td>
    </tr>
    <tr>
        <td>Closing Day (if applicable): .......................</td>
        <td>Opening Day (if applicable): .......................</td>
    </tr>

</table
><br><br>

<table style="width:105%; border-collapse:collapse; margin: 0; padding: 0;" border="1" id="table">
    <tr>
        <th>S/N</th>
        <th>ITEM</th>
        <th style="width: 10%">Mathematics</th>
        <th>Reading&Writing</th>
        <th>English</th>
        <th>Art&Craft</th>
        <th>AGGREGATE</th>
        <th>AVERAGE</th>
    </tr>
    <tr>
        <td><b>1</b></td>
        <td><b>Subject top score %</b></td>
        <td class="centered">{{$max1 = \App\Models\Grades\Nursery::maxMath($results->term)}}</td>
        <td class="centered">{{$max2 = \App\Models\Grades\Nursery::maxRW($results->term)}}</td>
        <td class="centered">{{$max3 = \App\Models\Grades\Nursery::maxEng($results->term)}}</td>
        <td class="centered">{{$max4 = \App\Models\Grades\Nursery::maxAC($results->term)}}</td>
        <td class="centered">{{$max5 = $max1 + $max2 + $max3 + $max4}}</td>
        <td class="centered">{{$max5/4}}</td>
    </tr>
    <tr>
        <td><b>2</b></td>
        <td><b>Class average</b></td>
        <td class="centered">{{$avg1 =\App\Models\Grades\Nursery::avgMath($results->term)}}</td>
        <td class="centered">{{$avg2 =\App\Models\Grades\Nursery::avgRW($results->term)}}</td>
        <td class="centered">{{$avg3 =\App\Models\Grades\Nursery::avgEng($results->term)}}</td>
        <td class="centered">{{$avg4 =\App\Models\Grades\Nursery::avgAC($results->term)}}</td>
        <td class="centered">{{$avg5 = $avg1 + $avg2 + $avg3 + $avg4}}</td>
        <td class="centered">{{$avg5/4}}</td>
    </tr>
    <tr>
        <td><b>3</b></td>
        <td><b>Pupil's score</b></td>
        @php $sub1 = $results->mathematics;$sub2 = $results->reading_and_writing; $sub3 = $results->english;
        $sub4 = $results->art_and_craft;
        @endphp
        <td class="centered">{{$results->mathematics}}</td>
        <td class="centered">{{$results->reading_and_writing}}</td>
        <td class="centered">{{$results->english}}</td>
        <td class="centered">{{$results->art_and_craft}}</td>
        <td class="centered">{{$resultAll = $sub1+$sub2+$sub3+$sub4}}</td>
        <td class="centered">{{$resultAll/4}}</td>
    </tr>
    <br/><br/>
    <tr>
        <td><b>4</b></td>
        <td colspan="7"><strong>Pupil's class position (Nafasi aliyoshika darasani): </strong><span style="color:red;font-weight: bolder">{{" ".$studentPosition." "}}</span><strong>   Class
                roster (Wanafunzi darasani):  <span style="color: red; font-weight: bolder">{{count(\App\models\Student::getStudents($currentYear))}}</span></strong>
        </td>

    </tr>
    <tr>
        <td><b>5</b></td>
        <td colspan="7"><strong>Class teacher's comments (Maelezo ya mwalimu wa darasa):</strong>
            ................................................................................................................................................................................
            ................................................................................................................................................................................

            <br>
            <b>Name:</b> .....................................................<b>Signature:</b>
            .............................................. <b>Date:</b> ..................................
        </td>

    </tr>
    <tr>
        <td><b>6</b></td>
        <td colspan="7"><strong>Headteacher's comments (Maelezo ya Mwalimu Mkuu):</strong>
            ................................................................................................................................................................................
            ................................................................................................................................................................................
            <br>
            <b>Name:</b> .....................................................<b>Signature:</b>
            .............................................. <b>Date:</b> ..................................
        </td>

    </tr>
    <tr>
        <td><b>7</b></td>
        <td colspan="7"><strong>Parent's acknowledgement and comments (Maelezo ya mzazi):</strong>
            ................................................................................................................................................................................
            ................................................................................................................................................................................
            <br>
            <b>Name:</b> .....................................................<b>Signature:</b>
            .............................................. <b>Date:</b> ..................................
        </td>

    </tr>


</table>
