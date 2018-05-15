
SELECT sub2.* 
FROM (SELECT sub.* 
	  FROM (
			SELECT * 
			FROM mydb 
			WHERE(weapon ='OTHER'or  weapon = 'HANDS' or weapon 
				  ='KNIFE' or weapon ='FIREARM')
  			)sub
  			
	  WHERE (sub.description = 'AGG. ASSAULT' or sub.description = 'ARSON' or sub.description
		= 'ASSAULT BY THREAT' or sub.description = 'AUTO THEFT' or sub.description = 'BURGLARY' or sub.description = 
		'COMMON ASSAULT' or sub.description = 'HOMICIDE' or sub.description = 'LARCENY' or sub.description = 
		'LARCENY FROM AUTO' or sub.description = 'RAPE' or sub.description = 'ROBBERY - STREET' or sub.description = 
		'ROBBERY - CARJACKING' or sub.description = 'ROBBERY - COMMERCIAL' or sub.description = 'ROBBERY - RESIDENCIAL' or sub.description = 
		'SHOOTING')
	)sub2
WHERE (sub2.district ='CENTRAL' or sub2.district = 'WESTERN' or sub2.district = 'NORTHEASTERN' or sub2.district = 'SOUTHWESTERN' or 
sub2.district = 'SOUTHEASTERN' or sub2.district = 'SOUTHERN' or sub2.district = 'NORTHERN' or sub2.district = 'EASTERN'
 or sub2.district = 'NORTHWESTERN');