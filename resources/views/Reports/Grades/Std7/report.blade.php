<style>
    td {
        padding: 4px;
    }
    th.rotate {
        height: 140px;
        white-space: nowrap;
        width: 70%;
    }

    div {
        transform:
                translate(-9px, 0px)
                rotate(-90deg);
        width: 30px;
        height: 12px;
    }
    .mmm{
        width: 60%;
    }
</style>

{{--<img src="{{asset('asset/images/logo.png')}}" style="margin-left: 22%; font-size: large">--}}
<img src="{{public_path('asset/images/logo.png')}}" style="margin-left: 22.5%; margin-top:-5%"><br><br>
<table style="width: 102.5%; margin-top:-2%; border-collapse: collapse" border="1">
    <tr>
        <td>Type of Examination: <span style="color: red; font-weight: bolder">MID TERM EXAMINATION</span></td>
        <td>Month & Year: <span style="color: red; font-weight: bolder">{{date('M Y')}}</span></td>
    </tr>
    <tr>
        <td>Pupils Full  Name:<span style="color: red; font-weight: bolder">{{$student->first_name." ".$student->last_name." ".$student->surname}}</span></td>
        <td>Admission Year:<span style="color: red; font-weight: bolder">{{" ".$student->admission_year}}</span></td>
    </tr>
    <tr>
        <td>Class: <span style="color: red; font-weight: bolder">Standard VII</span></td>
        @php  $currentYear = date('Y'); @endphp
        <td>Number of Pupils in a class: <span style="color: red; font-weight: bolder">{{count(\App\models\Student::getStudents($currentYear))}}</span></td>
    </tr>
    <tr>
        <td>Closing Day (if applicable): .......................</td>
        <td>Opening Day (if applicable): .......................</td>
    </tr>

</table><br><br>

<table class="mmm" style="margin-top:-3.5%; border-collapse:collapse;" border="1" >
    <tr >
        <th class="rotate" width="10%"><div style="margin-top:10%"><span>S/N</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>ITEM</span></div></th>
        <th class="rotate" style="width: 2%"><div style="margin-top: 10%"><span>Mathe</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>English</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>Kiswahili</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>Science</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>ICT</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>PDS</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>History</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>Geog</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>Civics</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span data-width="2%">V/Skills</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span >AGGREG</span></div></th>
        <th class="rotate"><div style="margin-top: 10%"><span>AVERAGE</span></div></th>
    </tr>
    <tr>
        <td><b>1</b></td>
        <td><b>Subject top score %</b></td>
        <td class="centered">{{$max1 = \App\Models\Grades\Std7::maxMath($results->term)}}</td>
        <td class="centered">{{$max2 = \App\Models\Grades\Std7::maxEng($results->term)}}</td>
        <td class="centered">{{$max3 = \App\Models\Grades\Std7::maxKis($results->term)}}</td>
        <td class="centered">{{$max4 = \App\Models\Grades\Std7::maxSc($results->term)}}</td>
        <td class="centered">{{$max5 = \App\Models\Grades\Std7::maxICT($results->term)}}</td>
        <td class="centered">{{$max6 = \App\Models\Grades\Std7::maxPDS($results->term)}}</td>
        <td class="centered">{{$max7 = \App\Models\Grades\Std7::maxHis($results->term)}}</td>
        <td class="centered">{{$max8 = \App\Models\Grades\Std7::maxGeog($results->term)}}</td>
        <td class="centered">{{$max9 = \App\Models\Grades\Std7::maxCiv($results->term)}}</td>
        <td class="centered">{{$max10 = \App\Models\Grades\Std7::maxVS($results->term)}}</td>
        <td class="centered">{{round($max11 = $max1 + $max2 + $max3 + $max4 + $max5 + $max6 + $max7 + $max8 + $max9 + $max10)}}</td>
        <td class="centered">{{round($max11/10)}}</td>
    </tr>
    <tr>
        <td><b>2</b></td>
        <td><b>Class average</b></td>
        <td class="centered">{{round($avg1 = \App\Models\Grades\Std7::avgMath($results->term))}}</td>
        <td class="centered">{{round($avg2 = \App\Models\Grades\Std7::avgEng($results->term))}}</td>
        <td class="centered">{{round($avg3 = \App\Models\Grades\Std7::avgKis($results->term))}}</td>
        <td class="centered">{{round($avg4 = \App\Models\Grades\Std7::avgSc($results->term))}}</td>
        <td class="centered">{{round($avg5 = \App\Models\Grades\Std7::avgICT($results->term))}}</td>
        <td class="centered">{{round($avg6 = \App\Models\Grades\Std7::avgPDS($results->term))}}</td>
        <td class="centered">{{round($avg7 = \App\Models\Grades\Std7::avgHis($results->term))}}</td>
        <td class="centered">{{round($avg8 = \App\Models\Grades\Std7::avgGeog($results->term))}}</td>
        <td class="centered">{{round($avg9 = \App\Models\Grades\Std7::avgCiv($results->term))}}</td>
        <td class="centered">{{round($avg10 = \App\Models\Grades\Std7::avgVS($results->term))}}</td>
        <td class="centered">{{round($avg11 = $avg1 + $avg2 + $avg3 + $avg4 + $avg5 + $avg6 + $avg7 + $avg8 + $avg9 + $avg10)}}</td>
        <td class="centered">{{round($avg11/10)}}</td>
    </tr>
    <tr>
        <td><b>3</b></td>
        <td><b>Pupil's score</b></td>
        @php $sub1 = $results->Mathematics;$sub2 = $results->English; $sub3 = $results->Kiswahili;
        $sub4 = $results->Science;$sub5 = $results->ICT;$sub6 = $results->PDS;
        $sub7 = $results->History;$sub8 = $results->Geography;$sub9 = $results->Civics;
        $sub10 = $results->Vocational_Skills;
        @endphp
        <td class="centered">{{$results->Mathematics}}</td>
        <td class="centered">{{$results->English}}</td>
        <td class="centered">{{$results->Kiswahili}}</td>
        <td class="centered">{{$results->Science}}</td>
        <td class="centered">{{$results->ICT}}</td>
        <td class="centered">{{$results->PDS}}</td>
        <td class="centered">{{$results->History}}</td>
        <td class="centered">{{$results->Geography}}</td>
        <td class="centered">{{$results->Civics}}</td>
        <td class="centered">{{$results->Vocational_Skills}}</td>
        <td class="centered">{{round($resultAll = $sub1+$sub2+$sub3+$sub4+$sub5+$sub6+$sub7+$sub8+$sub9+$sub10)}}</td>
        <td class="centered">{{round($resultAll/10)}}</td>
    </tr>

</table>

<table class="mmm" style="width:102.5%;margin-top:0.2%; border-collapse:collapse" border="1" >
    <tr>
        <td><b>4</b></td>
        <td colspan="7"><strong>Pupil's class position (Nafasi aliyoshika darasani):</strong><span style="color:red;font-weight: bolder">{{" ".$studentPosition." "}}</span>
            <strong>Class roster (Wanafunzi darasani):</strong><span style="color: red; font-weight: bolder">{{" ".count(\App\models\Student::getStudents($currentYear))}}</span></td>

    </tr>
    <tr>
        <td><b>5</b></td>
        <td colspan="7"><strong>Class teacher's comments (Maelezo ya mwalimu wa darasa):</strong>
            ................................................................................................................................................................................
            ................................................................................................................................................................................

            <br>
            <b>Name:</b> .....................................................<b>Signature:</b> .............................................. <b>Date:</b> ..................................
        </td>

    </tr>
    <tr>
        <td><b>6</b></td>
        <td colspan="7"><strong>Headteacher's comments (Maelezo ya Mwalimu Mkuu):</strong>
            ................................................................................................................................................................................
            ................................................................................................................................................................................
            <br>
            <b>Name:</b> .....................................................<b>Signature:</b> .............................................. <b>Date:</b> ..................................
        </td>

    </tr>
    <tr>
        <td><b>7</b></td>
        <td colspan="7"><strong>Parent's acknowledgement and comments (Maelezo ya mzazi):</strong>
            ................................................................................................................................................................................
            ................................................................................................................................................................................
            <br>
            <b>Name:</b> .....................................................<b>Signature:</b> .............................................. <b>Date:</b> ..................................
        </td>

    </tr>
</table>