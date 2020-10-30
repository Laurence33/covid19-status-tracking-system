<?php
    include_once 'header.php';
?>
<span>
    <a href="region.php/reg=reg_code">Region Description</a>
    > ISO
</span>

<br><br>
<section>
<h1>prov_des</h1>
<h3>num_cases</h3>
<h3>num_active</h3>
<h3>num_recoveries</h3>
<h3>num_deaths</h3>
<h3>num_surveillances</h3>
</section>

<br><br>
<h2>City/Municipalities</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Description</th>
            <th>PSGC Code</th>
            <th>Region</th>
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
            <a href="citymun.php?code=citymun_code">citymun_desc</a>
            </td>
            <td>psgc_code</td>
            <td>reg_desc</td>
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