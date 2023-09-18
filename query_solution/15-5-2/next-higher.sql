SELECT
    b1.*
FROM
    Bugs AS b1
    INNER JOIN (
        SELECT
            CEIL(
                RAND() * (
                    SELECT
                        MAX(bug_id)
                    FROM
                        Bugs
                )
            ) AS bug_id
    ) AS b2 ON b1.bug_id >= b2.bug_id
ORDER BY
    b1.bug_id
LIMIT
    1;