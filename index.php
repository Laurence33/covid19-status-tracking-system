<?php
    include 'header.php';
?>

<h1>COVID19 Status Tracking System</h1>

<br><br>
<h2>Regions</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Region Description</th>
            <th>PSGC Code</th>
            <th>Region Code</th>
            <th>Island Group</th>
            <th>Cases</th>
            <th>Active Cases</th>
            <th>Recoveries</th>
            <th>Deaths</th>
            <th>Surveillances</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
            <a href="region.php?code=reg_code">reg_desc</a>
            </td>
            <td>psgc_code</td>
            <td>reg_code</td>
            <td>island_group</td>
            <td>num_cases</td>
            <td>num_active</td>
            <td>num_recoveries</td>
            <td>num_deaths</td>
            <td>num_surveillances</td>
        </tr>
    </tbody>
</table>

<?php
    include 'footer.php';
?>