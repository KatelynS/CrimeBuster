//charts using c3 library


var chart = c3.generate({
    bindto: '#chart',
    data: {
        columns: [
           // ['data1', 0, 200, 100, 400, 150, 250],
           // ['data2', 130, 100, 140, 200, 150, 50]
           ['Firearm', 0],
           ['Hands', 0],
           ['Knife', 0],
           ['Other', 0],
           ['No Weapon', 0],
        ],
        type: 'bar'
    },
    bar: {
        width: {
            ratio: 0.5 // this makes bar width 50% of length between ticks
        }
        // or
        //width: 100 // this makes bar width 100px
    }
});

/*
setTimeout(function () {
    chart.load({
        columns: [
            ['data3', 130, -150, 200, 300, -200, 100]
        ]
    });
}, 1000);

*/

//sm update bar graph
function updateBarGraph(Data, bCType){
	
	if(bCType=="weaponBC"){
			var chart = c3.generate({
		    bindto: '#chart',
		    data: {
		        columns: [
		            ['Firearm', Data[0]],
		           ['Hands', Data[1]],
		           ['Knife', Data[2]],
		           ['Other', Data[3]],
		           ['No Weapon', Data[4]],
		        ],
		        type: 'bar'
		    },
		    bar: {
		        width: {
		            ratio: 0.5 // this makes bar width 50% of length between ticks
		        }
		        // or
		        //width: 100 // this makes bar width 100px
		    }
		});

	}
	
	else if(bCType=="crimeBC"){
		var chart = c3.generate({
		    bindto: '#chart',
		    data: {
		        columns: [
		            ['AGG. Assault', Data[0]],
		           ['Arson', Data[1]],
		           ['ASL Threat', Data[2]],
		           ['Auto Theft', Data[3]],
		           ['Burglary', Data[4]],
		           ['Common ASL', Data[5]],
		           ['Homicide', Data[6]],
		           ['Larceny', Data[7]],
		           ['Larceny Auto', Data[8]],
		           ['Rape', Data[9]],
		           ['Robb-Street', Data[10]],
		           ['Robb-Carjacking', Data[11]],
		           ['Robb-Commercial', Data[12]],
		           ['Robb-Residence', Data[13]],
		           ['Shooting', Data[14]],
		        ],
		        type: 'bar'
		    },
		    bar: {
		        width: {
		            ratio: 0.5 // this makes bar width 50% of length between ticks
		        }
		        // or
		        //width: 100 // this makes bar width 100px
		    }
		});
	}
	
	else if(bCType=="districtBC"){
		
		var chart = c3.generate({
		    bindto: '#chart',
		    data: {
		        columns: [
		            ['Northern', Data[0]],
		           ['Southern', Data[1]],
		           ['Eastern', Data[2]],
		           ['Western', Data[3]],
		           ['Central', Data[4]],
		           ['N. Eastern', Data[5]],
		           ['N. Western', Data[6]],
		           ['S. Eastern', Data[7]],
		           ['S. Western', Data[8]],
		          
		        ],
		        type: 'bar'
		    },
		    bar: {
		        width: {
		            ratio: 0.5 // this makes bar width 50% of length between ticks
		        }
		        // or
		        //width: 100 // this makes bar width 100px
		    }
		});
	}
	else{
		var chart = c3.generate({
    bindto: '#chart',
    data: {
        columns: [
           // ['data1', 0, 200, 100, 400, 150, 250],
           // ['data2', 130, 100, 140, 200, 150, 50]
           ['Not Valid Selection', 0],
         
        ],
        type: 'bar'
    },
    bar: {
        width: {
            ratio: 0.5 // this makes bar width 50% of length between ticks
        }
        // or
        //width: 100 // this makes bar width 100px
    }
});
	}
	
}
