<script language="javascript">
(function(w,d,s,g,js,fjs){ldelim}
  g=w.gapi||(w.gapi={ldelim}{rdelim});g.analytics={ldelim}q:[],ready:function(cb){ldelim}this.q.push(cb){rdelim}{rdelim};
  js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fjs.parentNode.insertBefore(js,fjs);js.onload=function(){ldelim}g.load('analytics'){rdelim};
{rdelim}(window,document,'script'));
</script>
<div class="row">
    <section id="visitor-container" class="col-5"></section>
    <section id="regions" class="col-5"></section>
    <section id="top-browsers" class="col-5"></section>
    <section id="devices" class="col-5"></section>
</div>
<script language="javascript">
gapi.analytics.ready(function(){

    //define the view id
    //var view_id = 'ga:204929331';
    var view_id = 'ga:201892527';

    //initialize the authorization
    gapi.analytics.auth.authorize({
    'serverAuth': {
      'access_token': '{$googleToken}'
        }
    });

    //create the visitor and sessions chart views
    var visitorSessions = new gapi.analytics.googleCharts.DataChart({
        query: {
            'ids': view_id, 
            'start-date': '30daysAgo',
            'end-date': 'yesterday',
            'metrics': 'ga:sessions,ga:users',
            'dimensions': 'ga:date'
        },
        chart: {            
            'container': 'visitor-container',
            'type': 'LINE',
            'options': {
                'title' : 'Usuários por Visita',
                'width': '100%'
            }
        }
    });
    //starts the chart view
    visitorSessions.execute();

    //set the top browsers chart view
    var topBrowsers = new gapi.analytics.googleCharts.DataChart({
        query: {
            'ids': view_id,
            'dimensions': 'ga:browser',
            'metrics': 'ga:pageviews',
            'sort': '-ga:pageviews',
            'max-results': 5 
        },
        chart: {            
            'container': 'top-browsers',
            'type': 'TABLE',
            'options': {
                'title': 'Top Navegadores',
                'width': '100%'
            }
        }
    });
    //starts the top browsers chart view
    topBrowsers.execute();

    //set the region chart view
    var regions = new gapi.analytics.googleCharts.DataChart({
        query: {
            'ids': view_id,
            'start-date': '90daysAgo',
            'end-date': 'yesterday',
            'dimensions': 'ga:city',
            'metrics': 'ga:users, ga:pageviews'
        },
        chart: {
            'container': 'regions',
            'type': 'GEO',
            'options': {
                'title': 'Usuários por Região',
                'width': '100%',
                'resolution': 'provinces',
                'region': 'BR'
            }
        }
    });

    //starts the region chart view
    regions.execute();

    //set the devices chart view
    var devices = new gapi.analytics.googleCharts.DataChart({
        query: {
            'ids': view_id,
            'start-date': '30daysAgo',
            'end-date': 'yesterday',
            'dimensions': 'ga:deviceCategory',
            'metrics': 'ga:users,ga:sessions'
        },
        chart: {
            'container': 'devices',
            'type': 'PIE',
            'options': {
                'title': 'Dispositivos',
                'width': '100%'
            }
        }
    });

    //starts the devices chart view
    devices.execute();

})
</script>