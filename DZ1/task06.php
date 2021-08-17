<?php
$cols = 10;
$rows = 10;

echo '<table>';

for ($tr = 1; $tr <= $rows; $tr++) {
    echo '<tr>';

    for ($td = 1; $td <= $cols; $td++) {
        $val = $tr * $td;

        if ($val % 2 === 0) {
            echo '<td>('.$val.')</td>';
        } else {
            echo '<td>['.$val.']</td>';
        }
    }

    echo '</tr>';
}

echo '</table>';
