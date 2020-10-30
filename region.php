<?php
    include_once 'header.php';
?>

<section>
<h1>Region Description</h1>
<h3>Island Group</h3>
<h3>Cases</h3>
<h3>Active Cases</h3>
<h3>Recoveries</h3>
<h3>Deaths</h3>
<h3>Surveillances</h3>
</section>

<br><br>
<h2>Provinces</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ISO</th>
            <th>Province Description</th>
            <th>PSGC Code</th>
            <th>Cases</th>
            <th>Active Cases</th>
            <th>Recoveries</th>
            <th>Deaths</th>
            <th>Surveillances</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>iso</th>
            <td>
            <a href="province.php?code=prov_code">prov_desc</a>
            </td>
            <td>psgc_code</td>
            <td>prov_code</td>
            <td>num_cases</td>
            <td>num_active</td>
            <td>num_recoveries</td>
            <td>num_deaths</td>
            <td>num_surveillances</td>
        </tr>
    </tbody>
</table>

<?php   
    include_once 'footer.php';
?>