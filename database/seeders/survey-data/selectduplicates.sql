SELECT md.*
FROM member_details md
INNER JOIN (
  SELECT member_name, family_detail_id
  FROM member_details
  GROUP BY member_name, family_detail_id
  HAVING count(member_name) > 1
) dupes ON (md.member_name = dupes.member_name AND md.family_detail_id = dupes.family_detail_id)
ORDER BY md.member_name;

 -- DELETE FROM member_details WHERE id in (2751, 2759,
 -- 4234, 4185, 4131,2744,2757,
-- 2772,
-- 2758,
-- 2745,
-- 2739,
-- 2762,
-- 2737,
-- 2765,
-- 2730,
-- 2767,
-- 2741,
-- 2764,
-- 2738,
-- 2746,
-- 2760,
-- 2774,
-- 2776,
-- 2777,
-- 2740,
-- 2731,
-- 2770,
-- 2773,
-- 2742,
-- 2735,
-- 2736,
-- 2748,
-- 2766,
-- 2761,
-- 2752,
-- 2753,
-- 520,
-- 2705,
-- 2754,
-- 2733,
-- 2743,
-- 2763,
-- 2729,
-- 2734,
-- 2749,
-- 2750,
-- 2747,
-- 2755,
-- 2775,
-- 2756,
-- 2732,
-- 2769,
-- 2768,
-- 2771
-- );
-- 4306
-- 1071
