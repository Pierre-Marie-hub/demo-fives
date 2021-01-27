<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;
use Cake\Routing\Router;

$this->disableAutoLayout();

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'mon-petit-cahier.fr';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">
            <h1>
                #Welcome to a short demo of CakePHP with GoogleChart
            </h1>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="column">
                        <div class="message default text-center">
                            <small>This dashboard is made with dummy data, aftreer add a country or a month, you need to regenarate data.</small>
                            <br>
                            <a href="<?=  Router::pathUrl('Productions::generate'); ?>"><button>Generate others dummy data</button></a>
                            <a href="<?=  Router::pathUrl('Countries::add'); ?>"><button>Add a country</button></a>
                            <a href="<?=  Router::pathUrl('Months::add'); ?>"><button>Add a month</button></a>
                            <a href="<?=  Router::pathUrl('Productions::index'); ?>"><button>Edit values</button></a>

                        </div>
                        <div id="url-rewriting-warning" class="alert url-rewriting">
                            <ul>
                                <li class="bullet problem">
                                    Source code is here <a target="_blank" rel="noopener" href="https://github.com/Pierre-Marie-hub/demo">Project's Github</a><br />
                                </li>
                            </ul>
                        </div>
                        <?php Debugger::checkSecurityKeys(); ?>
                    </div>
                </div>
                <div id="chart_div" style="width: 100%; min-height: 400px;">
                    <center>
                        <img src="img/loading.gif"/>
                        <br>
                        Array is coming
                    </center>

                </div>
                <div class="row">
                    <div class="column">
                        <h4>Environment</h4>
                        <ul>
                            The ICO composite indicator in December increased by 4.6% to 114.74 US cents/lb as prices for Arabica group indicators increased. The largest increase occurred for Brazilian Naturals, which grew by 8% to 114.96 US cents/lb, which is the highest monthly average since December 2019 when they reached 126.36 US cents/lb. Colombian Milds rose by 5.7% to 170.44 US cents/lb and Other Milds by 4.7% to 157.81 US cents/lb, which are both higher than their average in December 2019. However, prices for Robusta fell by 0.5% to 72.04 US cents/lb. In the first two months of coffee year 2020/21, total exports were 6.5% higher at 20.2 million bags compared to the same period last year as shipments for all groups declined except Brazilian Naturals, which rose by 23.1% to 8.31 million bags. Likely due to the impact of the covid-19 pandemic, imports by ICO importing Members and the United States decreased by 4.5% to 129.98 million bags in coffee year 2019/20. While both green and roasted imports declined in coffee year 2019/20, imports of soluble coffee increased by 1% to 14.4 million bags. In coffee year 2019/20, re-exports by ICO importing Members and the United States rose by 0.4% to 46.93 million bags.
                        </ul>
                        <div class="column">
                            <h4>More info...</h4>
                            • World coffee exports amounted to 10.15 million bags in November 2020, compared with 9.6 million in November 2019.
                            • Exports in the first 2 months of coffee year 2020/21 (Oct/20 to Nov/20) have increased by 6.5% to 20.2 million bags compared to 18.97 million bags in the same period in 2019/20.
                            • In the twelve months ending November 2020, exports of Arabica totalled 79.81 million bags compared to 83.01 million bags last year; whereas Robusta exports amounted to 48.66 million bags compared to 48.72 million bags.
                        </div>
                    </div>
                    <div class="column ">
                        <h4>About ICO</h4>
                        <ul><p>
                            The International Coffee Organization (ICO) is the main intergovernmental organization for coffee, bringing together exporting and importing governments to tackle the challenges facing the world coffee sector through international cooperation. Its Member governments represent 98% of world coffee production and 67% of world consumption.

                            The ICO’s mission is to strengthen the global coffee sector and promote its sustainable expansion in a market-based environment for the betterment of all participants in the coffee sector. It makes a practical contribution to the development of a sustainable world coffee sector and to reducing poverty in developing countries by:

                            Enabling governments and the private sector to exchange views on coffee matters, market conditions and trends, and coordinate policies at high-level meetings

                            Developing and seeking finance for projects that benefit the world coffee economy

                            Promoting coffee quality through a Coffee Quality-Improvement Programme

                            Promoting market transparency by providing a wide range of statistics on the world coffee sector

                            Developing coffee consumption and markets for coffee through innovative market development activities

                            Encouraging the development of strategies to enhance the capacity of local communities and small-scale farmers

                            Promoting training and information programmes to assist the transfer of technology relevant to coffee

                            Facilitating information on financial tools and services to assist producers

                            Providing objective and comprehensive economic, technical and scientific information on the world coffee sector.

                            ​

                            The ICO was set up in London in 1963 under the auspices of the United Nations because of the great economic importance of coffee. It administers the International Coffee Agreement (ICA), an important instrument for development cooperation. The latest Agreement, the ICA 2007, entered into force on 2 February 2011.
                        </p>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">

                    <div class="column">
                        <h4>See you soon</h4>
                        <ul>
                            <li class="bullet success">Thanks for visiting our website</li>
                            <li class="bullet success">
                                <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/en/tutorials-and-examples/cms/installation.html">Contact us</a>
                            </li>
                            <li class="bullet success">
                                <a target="_blank" rel="noopener" href="https://github.com/Pierre-Marie-hub/redeploy">Another repo about Ansible</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>

            </div>
        </div>
    </main>
</body>
<?= $this->Html->script('chart'); ?>
<?= $this->Html->script('jquery'); ?>
</html>
