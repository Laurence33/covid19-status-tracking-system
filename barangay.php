<?php
    include_once 'header.php';
?>
<span>
    <a href="region.php/reg=reg_code">Region Description</a>
    >
    <a href="province.php/code=prov_code">Province Description</a>
    >
    <a href="citymun.php/code=citymun_desc">City/Mun Description</a>
    >
    Barangay Description
</span>

<br><br>
<section>
<h1>brgy_desc</h1>
<h3>num_cases</h3>
<h3>num_active</h3>
<h3>num_recoveries</h3>
<h3>num_deaths</h3>
<h3>num_surveillances</h3>
</section>

<br><br>
<h2>Cases</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Age</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
            <a href="">id</a>
            </th>
            <td>status</td>
            <td>age</td>
            <td>fname</td>
            <td>mname</td>
            <td>lname</td>
        </tr>
    </tbody>
</table>

<br><br><br>
<h2>Surveillances</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Age</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
            <a href="">id</a>
            </th>
            <td>status</td>
            <td>age</td>
            <td>fname</td>
            <td>mname</td>
            <td>lname</td>
        </tr>
    </tbody>
</table>

<?php   
    include_once 'footer.php';
?>