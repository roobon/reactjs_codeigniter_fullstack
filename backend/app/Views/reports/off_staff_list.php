<br>
<?php
if (!empty($empls)) : ?>
    <table class="table table-striped">
        <tr>
            <th>
                EMP Code
            </th>
            <th>
                Name
            </th>
            <th>
                Email
            </th>
        </tr>
        <?php
        foreach ($empls as $empl) : ?>
            <tr>
                <td><?= $empl['employeeNumber']; ?></td>
                <td><?= $empl['firstName'] . " " . $empl['lastName']; ?></td>
                <td><?= $empl['email']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>