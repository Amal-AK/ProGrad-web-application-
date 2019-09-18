
 $.ajax({
       url : '../php/courbe_etat_date.php',
       type : 'GET',
       dataType: 'json',
       success: function(resultat,statut){

       var dates= resultat.tabdates ;
       var etat = resultat.tabetat ;

       var ctx = document.getElementById("myChart").getContext('2d');
       var myChart = new Chart(ctx,{
        /*type: 'horizontalBar',*/
           type: 'line',
            data: {
            labels: dates,
            datasets: [{
            label: 'Jours',
            data: etat,
            borderColor:"#cd4e56",
            backgroundColor:' rgba(0,178,156,0.1)',
            }]
        },
    });
  }});

  $.ajax({

       url: '../php/etat_coll_phases_cour.php',
       type: 'GET',
       dataType : 'json',
       success : function(resultat1,statut){
       var phases= resultat1.tabphases ;
       var etat1 = resultat1.tabetat_phase ;



       var ctx2 = document.getElementById("phase").getContext('2d');
    var myChart2 = new Chart(ctx2, {
         type: 'horizontalBar',
        data: {
            labels: phases,
            datasets: [{
                label: 'Pourcentage %',
                data: etat1,
                borderColor: "#4ecdc5",
                backgroundColor: '#4ecdc5',
                borderWidth:2,
            }]
        },
         options: {
            scales: {
                 yAxes: [{
            barThickness : 50
        }],
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                               }
                }]
            },
        }
    });

  }});

   $.ajax({
       url : '../php/etat_indiv_ph.php',
       type : 'GET',
       dataType : 'json',
       success : function(resultat2,statut){
      var phases1= resultat2.tabphase1;
      var etatetud1 = resultat2.tabetud1;
      var etatetud2 = resultat2.tabetud2;
      var tabnom =resultat2.tabnom;
      var tab_avancement_indiv = resultat2.tabavancement;
      var type= resultat2.type;
      var ctx1 = document.getElementById("bar").getContext('2d');
      var myChart1 = new Chart(ctx1, {
         type: 'horizontalBar',
         data: {
            labels: tabnom,
            datasets: [{
            label: 'Pourcentage %',
            data:tab_avancement_indiv ,
            borderColor: '#4ecdc5',
            backgroundColor: "#4ecdc5",
            borderWidth:2,

            }]
        },
         options: {

            scales: {
                    yAxes: [{
            barThickness : 50
        }],
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                               }
                }]
            },
        }
    });



    if (resultat2.type==' Binôme')
    {
         var ctx3= document.getElementById("barV").getContext('2d');
    var myChart3= new Chart(ctx3,
    {
    type: 'bar',
    data: {
      labels: phases1,
      datasets: [
        {
          label: tabnom[0] ,
          backgroundColor: "#00b29c",
          data: etatetud1
        }, {
          label: tabnom[1] ,
          backgroundColor: "#008fe2",
          data: etatetud2
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Avancement par pourcentage'
      }
    }
});
    }
    else
    {
        var container= document.getElementById('delete');
        var parent = document.getElementById('parent');
        parent.removeChild(container);
        change= document.getElementById('div')
        change.classList.remove("col-lg-6");
        change.classList.add("col-lg-8");
    }
}});
