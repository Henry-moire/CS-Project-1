<h1>Opportunities list</h1>

<table border = "1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>date</td>
    <td>location</td>
    <td>tags</td>
    <td>schedule</td>
    <td>skills</td>
    <td>requirements</td>
    <td>no_of_volunteers_needed</td>
    <td>no_of_volunteers_assigned</td>
  </tr>
  @foreach($opportunities as $opportunities)
  <tr>
    <td>{{$opportunities['id']}}</td>
    <td>{{$opportunities['title']}}</td>
    <td>{{$opportunities['date']}}</td>
    <td>{{$opportunities['location']}}</td>
    <td>{{$opportunities['tags']}}</td>
    <td>{{$opportunities['schedule']}}</td>
    <td>{{$opportunities['skills']}}</td>
    <td>{{$opportunities['requirements']}}</td>
    <td>{{$opportunities['no_of_volunteers_needed']}}</td>
    <td>{{$opportunities['no_of_volunteers_assigned']}}</td>
  </tr>
  @endforeach
</table>