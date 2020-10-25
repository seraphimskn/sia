<?php
/* Smarty version 3.1.30, created on 2020-03-23 15:23:23
  from "/var/www/html/sigms/views/modules/googleAPI.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e78d46b141bf2_27814743',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1cde68727ec611c7f95da24dffd51ed7f5ce8974' => 
    array (
      0 => '/var/www/html/sigms/views/modules/googleAPI.tpl',
      1 => 1584130662,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e78d46b141bf2_27814743 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 language="javascript">
(function(w,d,s,g,js,fjs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
  js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
}(window,document,'script'));
<?php echo '</script'; ?>
>
<div class="row">
    <section id="visitor-container" class="col-5"></section>
    <section id="regions" class="col-5"></section>
    <section id="top-browsers" class="col-5"></section>
    <section id="devices" class="col-5"></section>
</div>
<?php echo '<script'; ?>
 language="javascript">
gapi.analytics.ready(function(){

    //define the view id
    //var view_id = 'ga:204929331';
    var view_id = 'ga:201892527';

    //initialize the authorization
    gapi.analytics.auth.authorize({
    'serverAuth': {
      'access_token': '<?php echo $_smarty_tpl->tpl_vars['googleToken']->value;?>
'
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
<?php echo '</script'; ?>
><?php }
}
