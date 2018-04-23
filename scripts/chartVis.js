
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
function updateBarGraph(Data){
	
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
