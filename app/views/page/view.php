<?php
$this->breadcrumbs[Yii::t('crud', 'Pages')] = array('admin');
$this->breadcrumbs[] = $model->id;

// Deps for smooth scroll
$cs = Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$smootScrollJs = Yii::app()->assetManager->publish(Yii::getPathOfAlias('vendor.kswedberg.jquery-smooth-scroll') . '/jquery.smooth-scroll.js');
$cs->registerScriptFile($smootScrollJs, CClientScript::POS_HEAD);
?>

<script>
	$(function() {

		// smooth scroll
		$('a').smoothScroll({
			afterScroll: function(e) {
				// Necessary to do manually
				window.location.hash = e.scrollTarget;
			}
		});

		// side bar affix (disabled since G3 gs does not sport affix behavior)
		/*
		 var $window = $(window)
		 setTimeout(function() {
		 $('.bs-docs-sidenav').affix({
		 offset: {
		 top: function() {
		 return $window.width() <= 980 ? 290 : 210
		 }
		 , bottom: 270
		 }
		 })
		 }, 100);
		 */

	});
</script>

<div class="row">
	<div class="span3 bs-docs-sidebar">
		<ul class="nav nav-list bs-docs-sidenav affix">
			<li class="active"><a href="#dropdowns"><i class="icon-chevron-right"></i> Dropdowns</a></li>
			<li><a href="#buttonGroups"><i class="icon-chevron-right"></i> Button groups</a></li>
			<li><a href="#buttonDropdowns"><i class="icon-chevron-right"></i> Button dropdowns</a></li>
			<li><a href="#navs"><i class="icon-chevron-right"></i> Navs</a></li>
			<li><a href="#breadcrumbs"><i class="icon-chevron-right"></i> Breadcrumbs</a></li>
			<li><a href="#pagination"><i class="icon-chevron-right"></i> Pagination</a></li>
			<li><a href="#labels-badges"><i class="icon-chevron-right"></i> Labels and badges</a></li>
			<li><a href="#typography"><i class="icon-chevron-right"></i> Typography</a></li>
			<li><a href="#thumbnails"><i class="icon-chevron-right"></i> Thumbnails</a></li>
			<li><a href="#alerts"><i class="icon-chevron-right"></i> Alerts</a></li>
			<li><a href="#progress"><i class="icon-chevron-right"></i> Progress bars</a></li>
			<li class=""><a href="#media"><i class="icon-chevron-right"></i> Media object</a></li>
			<li class=""><a href="#misc"><i class="icon-chevron-right"></i> Misc</a></li>
		</ul>
	</div>
	<div class="span9">


		<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
		<h1>
			<?php echo Yii::t('crud', 'Page') ?> <small><?php echo Yii::t('crud', 'View') ?> #<?php echo $model->id ?></small></h1>

		<!-- Dropdowns
		================================================== -->
		<section id="dropdowns">
			<div class="page-header">
				<h1>Dropdown menus</h1>
			</div>

			<h2>Example</h2>
			<p>Toggleable, contextual menu for displaying lists of links. Made interactive with the <a href="./javascript.html#dropdowns">dropdown JavaScript plugin</a>.</p>
			<div class="bs-docs-example">
				<div class="dropdown clearfix">
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
						<li><a tabindex="-1" href="#">Action</a></li>
						<li><a tabindex="-1" href="#">Another action</a></li>
						<li><a tabindex="-1" href="#">Something else here</a></li>
						<li class="divider"></li>
						<li><a tabindex="-1" href="#">Separated link</a></li>
					</ul>
				</div>
			</div>
			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-menu"</span><span class="pln"> </span><span class="atn">role</span><span class="pun">=</span><span class="atv">"menu"</span><span class="pln"> </span><span class="atn">aria-labelledby</span><span class="pun">=</span><span class="atv">"dropdownMenu"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">tabindex</span><span class="pun">=</span><span class="atv">"-1"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Action</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">tabindex</span><span class="pun">=</span><span class="atv">"-1"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Another action</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">tabindex</span><span class="pun">=</span><span class="atv">"-1"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Something else here</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"divider"</span><span class="tag">&gt;&lt;/li&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">tabindex</span><span class="pun">=</span><span class="atv">"-1"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Separated link</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L6"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

          <h2>Markup</h2>
          <p>Looking at just the dropdown menu, here's the required HTML. You need to wrap the dropdown's trigger and the dropdown menu within <code>.dropdown</code>, or another element that declares <code>position: relative;</code>. Then just create the menu.</p>

<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="com">&lt;!-- Link or button to toggle dropdown --&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-menu"</span><span class="pln"> </span><span class="atn">role</span><span class="pun">=</span><span class="atv">"menu"</span><span class="pln"> </span><span class="atn">aria-labelledby</span><span class="pun">=</span><span class="atv">"dLabel"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">tabindex</span><span class="pun">=</span><span class="atv">"-1"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Action</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L4"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">tabindex</span><span class="pun">=</span><span class="atv">"-1"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Another action</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L5"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">tabindex</span><span class="pun">=</span><span class="atv">"-1"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Something else here</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L6"><span class="pln">    </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"divider"</span><span class="tag">&gt;&lt;/li&gt;</span></li><li class="L7"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">tabindex</span><span class="pun">=</span><span class="atv">"-1"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Separated link</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L8"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L9"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h2>Options</h2>
          <p>Align menus to the right and add include additional levels of dropdowns.</p>

          <h3>Aligning the menus</h3>
          <p>Add <code>.pull-right</code> to a <code>.dropdown-menu</code> to right align the dropdown menu.</p>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-menu pull-right"</span><span class="pln"> </span><span class="atn">role</span><span class="pun">=</span><span class="atv">"menu"</span><span class="pln"> </span><span class="atn">aria-labelledby</span><span class="pun">=</span><span class="atv">"dLabel"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

          <h3>Disabled menu options</h3>
          <p>Add <code>.disabled</code> to a <code>&lt;li&gt;</code> in the dropdown to disable the link.</p>
          <div class="bs-docs-example">
            <div class="dropdown clearfix">
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
                <li><a tabindex="-1" href="#">Regular link</a></li>
                <li class="disabled"><a tabindex="-1" href="#">Disabled link</a></li>
                <li><a tabindex="-1" href="#">Another link</a></li>
              </ul>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-menu"</span><span class="pln"> </span><span class="atn">role</span><span class="pun">=</span><span class="atv">"menu"</span><span class="pln"> </span><span class="atn">aria-labelledby</span><span class="pun">=</span><span class="atv">"dropdownMenu"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">tabindex</span><span class="pun">=</span><span class="atv">"-1"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Regular link</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"disabled"</span><span class="tag">&gt;&lt;a</span><span class="pln"> </span><span class="atn">tabindex</span><span class="pun">=</span><span class="atv">"-1"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Disabled link</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">tabindex</span><span class="pun">=</span><span class="atv">"-1"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Another link</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L4"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

          <h3>Sub menus on dropdowns</h3>
          <p>Add an extra level of dropdown menus, appearing on hover like those of OS X, with some simple markup additions. Add <code>.dropdown-submenu</code> to any <code>li</code> in an existing dropdown menu for automatic styling.</p>
          <div class="bs-docs-example bs-docs-example-submenus">

            <div class="pull-left">
              <p class="muted">Default</p>
              <div class="dropdown clearfix">
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                  <li><a tabindex="-1" href="#">Action</a></li>
                  <li><a tabindex="-1" href="#">Another action</a></li>
                  <li><a tabindex="-1" href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-submenu">
                    <a tabindex="-1" href="#">More options</a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>

            <div class="pull-left">
              <p class="muted">Dropup</p>
              <div class="dropup">
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                  <li><a tabindex="-1" href="#">Action</a></li>
                  <li><a tabindex="-1" href="#">Another action</a></li>
                  <li><a tabindex="-1" href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-submenu">
                    <a tabindex="-1" href="#">More options</a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>

            <div class="pull-left">
              <p class="muted">Left submenu</p>
              <div class="dropdown">
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                  <li><a tabindex="-1" href="#">Action</a></li>
                  <li><a tabindex="-1" href="#">Another action</a></li>
                  <li><a tabindex="-1" href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-submenu pull-left">
                    <a tabindex="-1" href="#">More options</a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>

          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-menu"</span><span class="pln"> </span><span class="atn">role</span><span class="pun">=</span><span class="atv">"menu"</span><span class="pln"> </span><span class="atn">aria-labelledby</span><span class="pun">=</span><span class="atv">"dLabel"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-submenu"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">tabindex</span><span class="pun">=</span><span class="atv">"-1"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">More options</span><span class="tag">&lt;/a&gt;</span></li><li class="L4"><span class="pln">    </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-menu"</span><span class="tag">&gt;</span></li><li class="L5"><span class="pln">      ...</span></li><li class="L6"><span class="pln">    </span><span class="tag">&lt;/ul&gt;</span></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L8"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

        </section>




        <!-- Button Groups
        ================================================== -->
        <section id="buttonGroups">
          <div class="page-header">
            <h1>Button groups</h1>
          </div>

          <h2>Examples</h2>
          <p>Two basic options, along with two more specific variations.</p>

          <h3>Single button group</h3>
          <p>Wrap a series of buttons with <code>.btn</code> in <code>.btn-group</code>.</p>
          <div class="bs-docs-example">
            <div class="btn-group" style="margin: 9px 0 5px;">
              <button class="btn">Left</button>
              <button class="btn">Middle</button>
              <button class="btn">Right</button>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn-group"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn"</span><span class="tag">&gt;</span><span class="pln">Left</span><span class="tag">&lt;/button&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn"</span><span class="tag">&gt;</span><span class="pln">Middle</span><span class="tag">&lt;/button&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn"</span><span class="tag">&gt;</span><span class="pln">Right</span><span class="tag">&lt;/button&gt;</span></li><li class="L4"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Multiple button groups</h3>
          <p>Combine sets of <code>&lt;div class="btn-group"&gt;</code> into a <code>&lt;div class="btn-toolbar"&gt;</code> for more complex components.</p>
          <div class="bs-docs-example">
            <div class="btn-toolbar" style="margin: 0;">
              <div class="btn-group">
                <button class="btn">1</button>
                <button class="btn">2</button>
                <button class="btn">3</button>
                <button class="btn">4</button>
              </div>
              <div class="btn-group">
                <button class="btn">5</button>
                <button class="btn">6</button>
                <button class="btn">7</button>
              </div>
              <div class="btn-group">
                <button class="btn">8</button>
              </div>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn-toolbar"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn-group"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    ...</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L4"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Vertical button groups</h3>
          <p>Make a set of buttons appear vertically stacked rather than horizontally.</p>
          <div class="bs-docs-example">
            <div class="btn-group btn-group-vertical">
              <button type="button" class="btn"><i class="icon-align-left"></i></button>
              <button type="button" class="btn"><i class="icon-align-center"></i></button>
              <button type="button" class="btn"><i class="icon-align-right"></i></button>
              <button type="button" class="btn"><i class="icon-align-justify"></i></button>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn-group btn-group-vertical"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>


          <hr class="bs-docs-separator">


          <h4>Checkbox and radio flavors</h4>
          <p>Button groups can also function as radios, where only one button may be active, or checkboxes, where any number of buttons may be active. View <a href="./javascript.html#buttons">the JavaScript docs</a> for that.</p>

          <h4>Dropdowns in button groups</h4>
          <p><span class="label label-info">Heads up!</span> Buttons with dropdowns must be individually wrapped in their own <code>.btn-group</code> within a <code>.btn-toolbar</code> for proper rendering.</p>
        </section>



        <!-- Split button dropdowns
        ================================================== -->
        <section id="buttonDropdowns">
          <div class="page-header">
            <h1>Button dropdown menus</h1>
          </div>


          <h2>Overview and examples</h2>
          <p>Use any button to trigger a dropdown menu by placing it within a <code>.btn-group</code> and providing the proper menu markup.</p>
          <div class="bs-docs-example">
            <div class="btn-toolbar" style="margin: 0;">
              <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown">Danger <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Warning <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">Success <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Info <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-inverse dropdown-toggle" data-toggle="dropdown">Inverse <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
            </div><!-- /btn-toolbar -->
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn-group"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn dropdown-toggle"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"dropdown"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    Action</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;span</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"caret"</span><span class="tag">&gt;&lt;/span&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;/a&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-menu"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">    </span><span class="com">&lt;!-- dropdown menu links --&gt;</span></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L8"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Works with all button sizes</h3>
          <p>Button dropdowns work at any size:  <code>.btn-large</code>, <code>.btn-small</code>, or <code>.btn-mini</code>.</p>
          <div class="bs-docs-example">
            <div class="btn-toolbar" style="margin: 0;">
              <div class="btn-group">
                <button class="btn btn-large dropdown-toggle" data-toggle="dropdown">Large button <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-small dropdown-toggle" data-toggle="dropdown">Small button <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-mini dropdown-toggle" data-toggle="dropdown">Mini button <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
            </div><!-- /btn-toolbar -->
          </div>

          <h3>Requires JavaScript</h3>
          <p>Button dropdowns require the <a href="./javascript.html#dropdowns">Bootstrap dropdown plugin</a> to function.</p>
          <p>In some cases—like mobile—dropdown menus will extend outside the viewport. You need to resolve the alignment manually or with custom JavaScript.</p>


          <hr class="bs-docs-separator">


          <h2>Split button dropdowns</h2>
          <p>Building on the button group styles and markup, we can easily create a split button. Split buttons feature a standard action on the left and a dropdown toggle on the right with contextual links.</p>
          <div class="bs-docs-example">
            <div class="btn-toolbar" style="margin: 0;">
              <div class="btn-group">
                <button class="btn">Action</button>
                <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-primary">Action</button>
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-danger">Danger</button>
                <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-warning">Warning</button>
                <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-success">Success</button>
                <button class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-info">Info</button>
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group">
                <button class="btn btn-inverse">Inverse</button>
                <button class="btn btn-inverse dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
            </div><!-- /btn-toolbar -->
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn-group"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn"</span><span class="tag">&gt;</span><span class="pln">Action</span><span class="tag">&lt;/button&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn dropdown-toggle"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"dropdown"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;span</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"caret"</span><span class="tag">&gt;&lt;/span&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;/button&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-menu"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">    </span><span class="com">&lt;!-- dropdown menu links --&gt;</span></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L8"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Sizes</h3>
          <p>Utilize the extra button classes <code>.btn-mini</code>, <code>.btn-small</code>, or <code>.btn-large</code> for sizing.</p>
          <div class="bs-docs-example">
            <div class="btn-toolbar">
              <div class="btn-group">
                <button class="btn btn-large">Large action</button>
                <button class="btn btn-large dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
            </div><!-- /btn-toolbar -->
            <div class="btn-toolbar">
              <div class="btn-group">
                <button class="btn btn-small">Small action</button>
                <button class="btn btn-small dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
            </div><!-- /btn-toolbar -->
            <div class="btn-toolbar">
              <div class="btn-group">
                <button class="btn btn-mini">Mini action</button>
                <button class="btn btn-mini dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
            </div><!-- /btn-toolbar -->
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn-group"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn btn-mini"</span><span class="tag">&gt;</span><span class="pln">Action</span><span class="tag">&lt;/button&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn btn-mini dropdown-toggle"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"dropdown"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;span</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"caret"</span><span class="tag">&gt;&lt;/span&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;/button&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-menu"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">    </span><span class="com">&lt;!-- dropdown menu links --&gt;</span></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L8"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Dropup menus</h3>
          <p>Dropdown menus can also be toggled from the bottom up by adding a single class to the immediate parent of <code>.dropdown-menu</code>. It will flip the direction of the <code>.caret</code> and reposition the menu itself to move from the bottom up instead of top down.</p>
          <div class="bs-docs-example">
            <div class="btn-toolbar" style="margin: 0;">
              <div class="btn-group dropup">
                <button class="btn">Dropup</button>
                <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <div class="btn-group dropup">
                <button class="btn primary">Right dropup</button>
                <button class="btn primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu pull-right">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn-group dropup"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn"</span><span class="tag">&gt;</span><span class="pln">Dropup</span><span class="tag">&lt;/button&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn dropdown-toggle"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"dropdown"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;span</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"caret"</span><span class="tag">&gt;&lt;/span&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;/button&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-menu"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">    </span><span class="com">&lt;!-- dropdown menu links --&gt;</span></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L8"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

        </section>



        <!-- Nav, Tabs, & Pills
        ================================================== -->
        <section id="navs">
          <div class="page-header">
            <h1>Nav: tabs, pills, and lists</h1>
          </div>

          <h2>Lightweight defaults <small>Same markup, different classes</small></h2>
          <p>All nav components here—tabs, pills, and lists—<strong>share the same base markup and styles</strong> through the <code>.nav</code> class.</p>

          <h3>Basic tabs</h3>
          <p>Take a regular <code>&lt;ul&gt;</code> of links and add <code>.nav-tabs</code>:</p>
          <div class="bs-docs-example">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Profile</a></li>
              <li><a href="#">Messages</a></li>
            </ul>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-tabs"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"active"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Home</span><span class="tag">&lt;/a&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">...</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">...</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L6"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

          <h3>Basic pills</h3>
          <p>Take that same HTML, but use <code>.nav-pills</code> instead:</p>
          <div class="bs-docs-example">
            <ul class="nav nav-pills">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Profile</a></li>
              <li><a href="#">Messages</a></li>
            </ul>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-pills"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"active"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Home</span><span class="tag">&lt;/a&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">...</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">...</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L6"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

          <h3>Disabled state</h3>
          <p>For any nav component (tabs, pills, or list), add <code>.disabled</code> for <strong>gray links and no hover effects</strong>. Links will remain clickable, however, unless you remove the <code>href</code> attribute. Alternatively, you could implement custom JavaScript to prevent those clicks.</p>
          <div class="bs-docs-example">
            <ul class="nav nav-pills">
              <li><a href="#">Clickable link</a></li>
              <li><a href="#">Clickable link</a></li>
              <li class="disabled"><a href="#">Disabled link</a></li>
            </ul>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-pills"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"disabled"</span><span class="tag">&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Home</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">  ...</span></li><li class="L4"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

          <h3>Component alignment</h3>
          <p>To align nav links, use the <code>.pull-left</code> or <code>.pull-right</code> utility classes. Both classes will add a CSS float in the specified direction.</p>


          <hr class="bs-docs-separator">


          <h2>Stackable</h2>
          <p>As tabs and pills are horizontal by default, just add a second class, <code>.nav-stacked</code>, to make them appear vertically stacked.</p>

          <h3>Stacked tabs</h3>
          <div class="bs-docs-example">
            <ul class="nav nav-tabs nav-stacked">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Profile</a></li>
              <li><a href="#">Messages</a></li>
            </ul>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-tabs nav-stacked"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

          <h3>Stacked pills</h3>
          <div class="bs-docs-example">
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Profile</a></li>
              <li><a href="#">Messages</a></li>
            </ul>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-pills nav-stacked"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>


          <hr class="bs-docs-separator">


          <h2>Dropdowns</h2>
          <p>Add dropdown menus with a little extra HTML and the <a href="./javascript.html#dropdowns">dropdowns JavaScript plugin</a>.</p>

          <h3>Tabs with dropdowns</h3>
          <div class="bs-docs-example">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Help</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </li>
            </ul>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-tabs"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-toggle"</span></li><li class="L3"><span class="pln">       </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"dropdown"</span></li><li class="L4"><span class="pln">       </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span></li><li class="L5"><span class="pln">        Dropdown</span></li><li class="L6"><span class="pln">        </span><span class="tag">&lt;b</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"caret"</span><span class="tag">&gt;&lt;/b&gt;</span></li><li class="L7"><span class="pln">      </span><span class="tag">&lt;/a&gt;</span></li><li class="L8"><span class="pln">    </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-menu"</span><span class="tag">&gt;</span></li><li class="L9"><span class="pln">      </span><span class="com">&lt;!-- links --&gt;</span></li><li class="L0"><span class="pln">    </span><span class="tag">&lt;/ul&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L2"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

          <h3>Pills with dropdowns</h3>
          <div class="bs-docs-example">
            <ul class="nav nav-pills">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Help</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </li>
            </ul>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-pills"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-toggle"</span></li><li class="L3"><span class="pln">       </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"dropdown"</span></li><li class="L4"><span class="pln">       </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span></li><li class="L5"><span class="pln">        Dropdown</span></li><li class="L6"><span class="pln">        </span><span class="tag">&lt;b</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"caret"</span><span class="tag">&gt;&lt;/b&gt;</span></li><li class="L7"><span class="pln">      </span><span class="tag">&lt;/a&gt;</span></li><li class="L8"><span class="pln">    </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-menu"</span><span class="tag">&gt;</span></li><li class="L9"><span class="pln">      </span><span class="com">&lt;!-- links --&gt;</span></li><li class="L0"><span class="pln">    </span><span class="tag">&lt;/ul&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L2"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>


          <hr class="bs-docs-separator">


          <h2>Nav lists</h2>
          <p>A simple and easy way to build groups of nav links with optional headers. They're best used in sidebars like the Finder in OS X.</p>

          <h3>Example nav list</h3>
          <p>Take a list of links and add <code>class="nav nav-list"</code>:</p>
          <div class="bs-docs-example">
            <div class="well" style="max-width: 340px; padding: 8px 0;">
              <ul class="nav nav-list">
                <li class="nav-header">List header</li>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li><a href="#">Applications</a></li>
                <li class="nav-header">Another list header</li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li class="divider"></li>
                <li><a href="#">Help</a></li>
              </ul>
            </div> <!-- /well -->
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-list"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav-header"</span><span class="tag">&gt;</span><span class="pln">List header</span><span class="tag">&lt;/li&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"active"</span><span class="tag">&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Home</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Library</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L4"><span class="pln">  ...</span></li><li class="L5"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>
          <p>
            <span class="label label-info">Note</span>
            For nesting within a nav list, include <code>class="nav nav-list"</code> on any nested <code>&lt;ul&gt;</code>.
          </p>

          <h3>Horizontal dividers</h3>
          <p>Add a horizontal divider by creating an empty list item with the class <code>.divider</code>, like so:</p>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-list"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"divider"</span><span class="tag">&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">  ...</span></li><li class="L4"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>


          <hr class="bs-docs-separator">


          <h2>Tabbable nav</h2>
          <p>Bring your tabs to life with a simple plugin to toggle between content via tabs. Bootstrap integrates tabbable tabs in four styles: top (default), right, bottom, and left.</p>

          <h3>Tabbable example</h3>
          <p>To make tabs tabbable, create a <code>.tab-pane</code> with unique ID for every tab and wrap them in <code>.tab-content</code>.</p>
          <div class="bs-docs-example">
            <div class="tabbable" style="margin-bottom: 18px;">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Section 1</a></li>
                <li><a href="#tab2" data-toggle="tab">Section 2</a></li>
                <li><a href="#tab3" data-toggle="tab">Section 3</a></li>
              </ul>
              <div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
                <div class="tab-pane active" id="tab1">
                  <p>I'm in Section 1.</p>
                </div>
                <div class="tab-pane" id="tab2">
                  <p>Howdy, I'm in Section 2.</p>
                </div>
                <div class="tab-pane" id="tab3">
                  <p>What up girl, this is Section 3.</p>
                </div>
              </div>
            </div> <!-- /tabbable -->
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tabbable"</span><span class="tag">&gt;</span><span class="pln"> </span><span class="com">&lt;!-- Only required for left/right tabs --&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-tabs"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"active"</span><span class="tag">&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#tab1"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"tab"</span><span class="tag">&gt;</span><span class="pln">Section 1</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#tab2"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"tab"</span><span class="tag">&gt;</span><span class="pln">Section 2</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-content"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane active"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"tab1"</span><span class="tag">&gt;</span></li><li class="L7"><span class="pln">      </span><span class="tag">&lt;p&gt;</span><span class="pln">I'm in Section 1.</span><span class="tag">&lt;/p&gt;</span></li><li class="L8"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L9"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"tab2"</span><span class="tag">&gt;</span></li><li class="L0"><span class="pln">      </span><span class="tag">&lt;p&gt;</span><span class="pln">Howdy, I'm in Section 2.</span><span class="tag">&lt;/p&gt;</span></li><li class="L1"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L3"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h4>Fade in tabs</h4>
          <p>To make tabs fade in, add <code>.fade</code> to each <code>.tab-pane</code>.</p>

          <h4>Requires jQuery plugin</h4>
          <p>All tabbable tabs are powered by our lightweight jQuery plugin. Read more about how to bring tabbable tabs to life <a href="./javascript.html#tabs">on the JavaScript docs page</a>.</p>

          <h3>Tabbable in any direction</h3>

          <h4>Tabs on the bottom</h4>
          <p>Flip the order of the HTML and add a class to put tabs on the bottom.</p>
          <div class="bs-docs-example">
            <div class="tabbable tabs-below">
              <div class="tab-content">
                <div class="tab-pane active" id="A">
                  <p>I'm in Section A.</p>
                </div>
                <div class="tab-pane" id="B">
                  <p>Howdy, I'm in Section B.</p>
                </div>
                <div class="tab-pane" id="C">
                  <p>What up girl, this is Section C.</p>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="active"><a href="#A" data-toggle="tab">Section 1</a></li>
                <li><a href="#B" data-toggle="tab">Section 2</a></li>
                <li><a href="#C" data-toggle="tab">Section 3</a></li>
              </ul>
            </div> <!-- /tabbable -->
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tabbable tabs-below"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-content"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    ...</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-tabs"</span><span class="tag">&gt;</span></li><li class="L5"><span class="pln">    ...</span></li><li class="L6"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L7"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h4>Tabs on the left</h4>
          <p>Swap the class to put tabs on the left.</p>
          <div class="bs-docs-example">
            <div class="tabbable tabs-left">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#lA" data-toggle="tab">Section 1</a></li>
                <li><a href="#lB" data-toggle="tab">Section 2</a></li>
                <li><a href="#lC" data-toggle="tab">Section 3</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="lA">
                  <p>I'm in Section A.</p>
                </div>
                <div class="tab-pane" id="lB">
                  <p>Howdy, I'm in Section B.</p>
                </div>
                <div class="tab-pane" id="lC">
                  <p>What up girl, this is Section C.</p>
                </div>
              </div>
            </div> <!-- /tabbable -->
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tabbable tabs-left"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-tabs"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    ...</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-content"</span><span class="tag">&gt;</span></li><li class="L5"><span class="pln">    ...</span></li><li class="L6"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L7"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h4>Tabs on the right</h4>
          <p>Swap the class to put tabs on the right.</p>
          <div class="bs-docs-example">
            <div class="tabbable tabs-right">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#rA" data-toggle="tab">Section 1</a></li>
                <li><a href="#rB" data-toggle="tab">Section 2</a></li>
                <li><a href="#rC" data-toggle="tab">Section 3</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="rA">
                  <p>I'm in Section A.</p>
                </div>
                <div class="tab-pane" id="rB">
                  <p>Howdy, I'm in Section B.</p>
                </div>
                <div class="tab-pane" id="rC">
                  <p>What up girl, this is Section C.</p>
                </div>
              </div>
            </div> <!-- /tabbable -->
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tabbable tabs-right"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-tabs"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    ...</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-content"</span><span class="tag">&gt;</span></li><li class="L5"><span class="pln">    ...</span></li><li class="L6"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L7"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

        </section>



        <!-- Breadcrumbs
        ================================================== -->
        <section id="breadcrumbs">
          <div class="page-header">
            <h1>Breadcrumbs <small></small></h1>
          </div>

          <h2>Examples</h2>
          <p>A single example shown as it might be displayed across multiple pages.</p>
          <div class="bs-docs-example">
            <ul class="breadcrumb">
              <li class="active">Home</li>
            </ul>
            <ul class="breadcrumb">
              <li><a href="#">Home</a> <span class="divider">/</span></li>
              <li class="active">Library</li>
            </ul>
            <ul class="breadcrumb" style="margin-bottom: 5px;">
              <li><a href="#">Home</a> <span class="divider">/</span></li>
              <li><a href="#">Library</a> <span class="divider">/</span></li>
              <li class="active">Data</li>
            </ul>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"breadcrumb"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Home</span><span class="tag">&lt;/a&gt;</span><span class="pln"> </span><span class="tag">&lt;span</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"divider"</span><span class="tag">&gt;</span><span class="pln">/</span><span class="tag">&lt;/span&gt;&lt;/li&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Library</span><span class="tag">&lt;/a&gt;</span><span class="pln"> </span><span class="tag">&lt;span</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"divider"</span><span class="tag">&gt;</span><span class="pln">/</span><span class="tag">&lt;/span&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"active"</span><span class="tag">&gt;</span><span class="pln">Data</span><span class="tag">&lt;/li&gt;</span></li><li class="L4"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

        </section>



        <!-- Pagination
        ================================================== -->
        <section id="pagination">
          <div class="page-header">
            <h1>Pagination <small>Two options for paging through content</small></h1>
          </div>

          <h2>Standard pagination</h2>
          <p>Simple pagination inspired by Rdio, great for apps and search results. The large block is hard to miss, easily scalable, and provides large click areas.</p>
          <div class="bs-docs-example">
            <div class="pagination">
              <ul>
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pagination"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;ul&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Prev</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">1</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L4"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">2</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L5"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">3</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L6"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">4</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L7"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">5</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L8"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Next</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L9"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L0"><span class="tag">&lt;/div&gt;</span></li></ol></pre>


          <hr class="bs-docs-separator">


          <h2>Options</h2>

          <h3>Disabled and active states</h3>
          <p>Links are customizable for different circumstances. Use <code>.disabled</code> for unclickable links and <code>.active</code> to indicate the current page.</p>
          <div class="bs-docs-example">
            <div class="pagination pagination-centered">
              <ul>
                <li class="disabled"><a href="#">«</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
             </ul>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pagination"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;ul&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"disabled"</span><span class="tag">&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">&amp;laquo;</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"active"</span><span class="tag">&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">1</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L4"><span class="pln">    ...</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L6"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
          <p>You can optionally swap out active or disabled anchors for spans to remove click functionality while retaining intended styles.</p>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pagination"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;ul&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"disabled"</span><span class="tag">&gt;&lt;span&gt;</span><span class="pln">&amp;laquo;</span><span class="tag">&lt;/span&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"active"</span><span class="tag">&gt;&lt;span&gt;</span><span class="pln">1</span><span class="tag">&lt;/span&gt;&lt;/li&gt;</span></li><li class="L4"><span class="pln">    ...</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L6"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Sizes</h3>
          <p>Fancy larger or smaller pagination? Add <code>.pagination-large</code>, <code>.pagination-small</code>, or <code>.pagination-mini</code> for additional sizes.</p>
          <div class="bs-docs-example">
            <div class="pagination pagination-large">
              <ul>
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
            <div class="pagination">
              <ul>
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
             </ul>
            </div>
            <div class="pagination pagination-small">
              <ul>
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
            <div class="pagination pagination-mini">
              <ul>
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pagination pagination-large"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;ul&gt;</span></li><li class="L2"><span class="pln">    ...</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L4"><span class="tag">&lt;/div&gt;</span></li><li class="L5"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pagination"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">  </span><span class="tag">&lt;ul&gt;</span></li><li class="L7"><span class="pln">    ...</span></li><li class="L8"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L9"><span class="tag">&lt;/div&gt;</span></li><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pagination pagination-small"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;ul&gt;</span></li><li class="L2"><span class="pln">    ...</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L4"><span class="tag">&lt;/div&gt;</span></li><li class="L5"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pagination pagination-mini"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">  </span><span class="tag">&lt;ul&gt;</span></li><li class="L7"><span class="pln">    ...</span></li><li class="L8"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L9"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Alignment</h3>
          <p>Add one of two optional classes to change the alignment of pagination links: <code>.pagination-centered</code> and <code>.pagination-right</code>.</p>
          <div class="bs-docs-example">
            <div class="pagination pagination-centered">
              <ul>
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
             </ul>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pagination pagination-centered"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
          <div class="bs-docs-example">
            <div class="pagination pagination-right">
              <ul>
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pagination pagination-right"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>


          <hr class="bs-docs-separator">


          <h2>Pager</h2>
          <p>Quick previous and next links for simple pagination implementations with light markup and styles. It's great for simple sites like blogs or magazines.</p>

          <h3>Default example</h3>
          <p>By default, the pager centers links.</p>
          <div class="bs-docs-example">
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pager"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Previous</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Next</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

          <h3>Aligned links</h3>
          <p>Alternatively, you can align each link to the sides:</p>
          <div class="bs-docs-example">
            <ul class="pager">
              <li class="previous"><a href="#">← Older</a></li>
              <li class="next"><a href="#">Newer →</a></li>
            </ul>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pager"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"previous"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">&amp;larr; Older</span><span class="tag">&lt;/a&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"next"</span><span class="tag">&gt;</span></li><li class="L5"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">Newer &amp;rarr;</span><span class="tag">&lt;/a&gt;</span></li><li class="L6"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L7"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

          <h3>Optional disabled state</h3>
          <p>Pager links also use the general <code>.disabled</code> utility class from the pagination.</p>
          <div class="bs-docs-example">
            <ul class="pager">
              <li class="previous disabled"><a href="#">← Older</a></li>
              <li class="next"><a href="#">Newer →</a></li>
            </ul>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pager"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"previous disabled"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">&amp;larr; Older</span><span class="tag">&lt;/a&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L4"><span class="pln">  ...</span></li><li class="L5"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

        </section>



        <!-- Labels and badges
        ================================================== -->
        <section id="labels-badges">
          <div class="page-header">
            <h1>Labels and badges</h1>
          </div>
          <h3>Labels</h3>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Labels</th>
                <th>Markup</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <span class="label">Default</span>
                </td>
                <td>
                  <code>&lt;span class="label"&gt;Default&lt;/span&gt;</code>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="label label-success">Success</span>
                </td>
                <td>
                  <code>&lt;span class="label label-success"&gt;Success&lt;/span&gt;</code>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="label label-warning">Warning</span>
                </td>
                <td>
                  <code>&lt;span class="label label-warning"&gt;Warning&lt;/span&gt;</code>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="label label-important">Important</span>
                </td>
                <td>
                  <code>&lt;span class="label label-important"&gt;Important&lt;/span&gt;</code>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="label label-info">Info</span>
                </td>
                <td>
                  <code>&lt;span class="label label-info"&gt;Info&lt;/span&gt;</code>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="label label-inverse">Inverse</span>
                </td>
                <td>
                  <code>&lt;span class="label label-inverse"&gt;Inverse&lt;/span&gt;</code>
                </td>
              </tr>
            </tbody>
          </table>

          <h3>Badges</h3>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Example</th>
                <th>Markup</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  Default
                </td>
                <td>
                  <span class="badge">1</span>
                </td>
                <td>
                  <code>&lt;span class="badge"&gt;1&lt;/span&gt;</code>
                </td>
              </tr>
              <tr>
                <td>
                  Success
                </td>
                <td>
                  <span class="badge badge-success">2</span>
                </td>
                <td>
                  <code>&lt;span class="badge badge-success"&gt;2&lt;/span&gt;</code>
                </td>
              </tr>
              <tr>
                <td>
                  Warning
                </td>
                <td>
                  <span class="badge badge-warning">4</span>
                </td>
                <td>
                  <code>&lt;span class="badge badge-warning"&gt;4&lt;/span&gt;</code>
                </td>
              </tr>
              <tr>
                <td>
                  Important
                </td>
                <td>
                  <span class="badge badge-important">6</span>
                </td>
                <td>
                  <code>&lt;span class="badge badge-important"&gt;6&lt;/span&gt;</code>
                </td>
              </tr>
              <tr>
                <td>
                  Info
                </td>
                <td>
                  <span class="badge badge-info">8</span>
                </td>
                <td>
                  <code>&lt;span class="badge badge-info"&gt;8&lt;/span&gt;</code>
                </td>
              </tr>
              <tr>
                <td>
                  Inverse
                </td>
                <td>
                  <span class="badge badge-inverse">10</span>
                </td>
                <td>
                  <code>&lt;span class="badge badge-inverse"&gt;10&lt;/span&gt;</code>
                </td>
              </tr>
            </tbody>
          </table>

          <h3>Easily collapsible</h3>
          <p>For easy implementation, labels and badges will simply collapse (via CSS's <code>:empty</code> selector) when no content exists within.</p>

        </section>



        <!-- Typographic components
        ================================================== -->
        <section id="typography">
          <div class="page-header">
            <h1>Typographic components</h1>
          </div>

          <h2>Hero unit</h2>
          <p>A lightweight, flexible component to showcase key content on your site. It works well on marketing and content-heavy sites.</p>
          <div class="bs-docs-example">
            <div class="hero-unit">
              <h1>Hello, world!</h1>
              <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
              <p><a class="btn btn-primary btn-large">Learn more</a></p>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"hero-unit"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;h1&gt;</span><span class="pln">Heading</span><span class="tag">&lt;/h1&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;p&gt;</span><span class="pln">Tagline</span><span class="tag">&lt;/p&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;p&gt;</span></li><li class="L4"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn btn-primary btn-large"</span><span class="tag">&gt;</span></li><li class="L5"><span class="pln">      Learn more</span></li><li class="L6"><span class="pln">    </span><span class="tag">&lt;/a&gt;</span></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;/p&gt;</span></li><li class="L8"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h2>Page header</h2>
          <p>A simple shell for an <code>h1</code> to appropriately space out and segment sections of content on a page. It can utilize the <code>h1</code>'s default <code>small</code>, element as well most other components (with additional styles).</p>
          <div class="bs-docs-example">
            <div class="page-header">
              <h1>Example page header <small>Subtext for header</small></h1>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"page-header"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;h1&gt;</span><span class="pln">Example page header </span><span class="tag">&lt;small&gt;</span><span class="pln">Subtext for header</span><span class="tag">&lt;/small&gt;&lt;/h1&gt;</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

        </section>



        <!-- Thumbnails
        ================================================== -->
        <section id="thumbnails">
          <div class="page-header">
            <h1>Thumbnails <small>Grids of images, videos, text, and more</small></h1>
          </div>

          <h2>Default thumbnails</h2>
          <p>By default, Bootstrap's thumbnails are designed to showcase linked images with minimal required markup.</p>
          <div class="row-fluid">
            <ul class="thumbnails">
              <li class="span3">
                <a href="#" class="thumbnail">
                  <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="data:image/png;base64,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bqQFAQIECBDoTkBA6K7kJkyAAAECBHIBASE30oIAAQIECHQnICB0V3ITJkCAAAECuYCAkBtpQYAAAQIEuhMQELoruQkTIECAAIFcQEDIjbQgQIAAAQLdCQgI3ZXchAkQIECAQC4gIORGWhAgQIAAge4EBITuSm7CBAgQIEAgFxAQciMtCBAgQIBAdwICQnclN2ECBAgQIJALCAi5kRYECBAgQKA7AQGhu5KbMAECBAgQyAUEhNxICwIECBAg0J2AgNBdyU2YAAECBAjkAgJCbqQFAQIECBDoTkBA6K7kJkyAAAECBHIBASE30oIAAQIECHQnICB0V3ITJkCAAAECuYCAkBtpQYAAAQIEuhMQELoruQkTIECAAIFcQEDIjbQgQIAAAQLdCQgI3ZXchAkQIECAQC4gIORGWhAgQIAAge4EBITuSm7CBAgQIEAgFxAQciMtCBAgQIBAdwICQnclN2ECBAgQIJALCAi5kRYECBAgQKA7AQGhu5KbMAECBAgQyAUEhNxICwIECBAg0J2AgNBdyU2YAAECBAjkAgJCbqQFAQIECBDoTkBA6K7kJkyAAAECBHIBASE30oIAAQIECHQnICB0V3ITJkCAAAECuYCAkBtpQWAu8Msvv8x+/vnn+f//9ddfsyOOOGJ23HHHzQ477LC1hP7444/Zt99+O/vtt99m//zzz+yQQw6ZnXDCCfP/1jliPD/++OPs77//nv/a4YcfPu9j3fGs85mrtI1xDWOK9kcfffTsf//73yq/Om/z008/zZ3jd6KfmM/xxx+/9rx2qs/KEBoSOMgCAsJBLoCP3/kC77///uztt9+e/fnnn5ODPfXUU2eXX375/ES41RGB4OWXX5599dVXk80OPfTQeT9nn332lv18/PHHszfffHP2+++/T7aLk+mVV145P6ke6CMCzwMPPDAPUMNx1VVXpXOKtjGv119/fb+dd7LPga6HzyOwPwICwv7o+d1dLRAnuyeeeGL2/fffrzTPyy67bHbBBRdMto1v+vv27ZuvGGTHKaecMrvhhhvmKwuLxyuvvDL76KOPsi7mP7/++utnp5122kptt6vRF198MXvuuec2dJcFhDB5/PHHZz/88MNKw4jwc84550y23ek+K01QIwI7REBA2CGFMIydJ/Dqq6/OPvzww7UGFisA55133obfiZWHhx9+eMO36qzTiy66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BAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpsD/ATQ/L8XfaE6lAAAAAElFTkSuQmCC">
                </a>
              </li>
              <li class="span3">
                <a href="#" class="thumbnail">
                  <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="data:image/png;base64,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bqQFAQIECBDoTkBA6K7kJkyAAAECBHIBASE30oIAAQIECHQnICB0V3ITJkCAAAECuYCAkBtpQYAAAQIEuhMQELoruQkTIECAAIFcQEDIjbQgQIAAAQLdCQgI3ZXchAkQIECAQC4gIORGWhAgQIAAge4EBITuSm7CBAgQIEAgFxAQciMtCBAgQIBAdwICQnclN2ECBAgQIJALCAi5kRYECBAgQKA7AQGhu5KbMAECBAgQyAUEhNxICwIECBAg0J2AgNBdyU2YAAECBAjkAgJCbqQFAQIECBDoTkBA6K7kJkyAAAECBHIBASE30oIAAQIECHQnICB0V3ITJkCAAAECuYCAkBtpQYAAAQIEuhMQELoruQkTIECAAIFcQEDIjbQgQIAAAQLdCQgI3ZXchAkQIECAQC4gIORGWhAgQIAAge4EBITuSm7CBAgQIEAgFxAQciMtCBAgQIBAdwICQnclN2ECBAgQIJALCAi5kRYECBAgQKA7AQGhu5KbMAECBAgQyAUEhNxICwIECBAg0J2AgNBdyU2YAAECBAjkAgJCbqQFAQIECBDoTkBA6K7kJkyAAAECBHIBASE30oIAAQIECHQnICB0V3ITJkCAAAECuYCAkBtpQWAu8Msvv8x+/vnn+f//9ddfsyOOOGJ23HHHzQ477LC1hP7444/Zt99+O/vtt99m//zzz+yQQw6ZnXDCCfP/1jliPD/++OPs77//nv/a4YcfPu9j3fGs85mrtI1xDWOK9kcfffTsf//73yq/Om/z008/zZ3jd6KfmM/xxx+/9rx2qs/KEBoSOMgCAsJBLoCP3/kC77///uztt9+e/fnnn5ODPfXUU2eXX375/ES41RGB4OWXX5599dVXk80OPfTQeT9nn332lv18/PHHszfffHP2+++/T7aLk+mVV145P6ke6CMCzwMPPDAPUMNx1VVXpXOKtjGv119/fb+dd7LPga6HzyOwPwICwv7o+d1dLRAnuyeeeGL2/fffrzTPyy67bHbBBRdMto1v+vv27ZuvGGTHKaecMrvhhhvmKwuLxyuvvDL76KOPsi7mP7/++utnp5122kptt6vRF198MXvuuec2dJcFhDB5/PHHZz/88MNKw4jwc84550y23ek+K01QIwI7REBA2CGFMIydJ/Dqq6/OPvzww7UGFisA55133obfiZWHhx9+eMO36qzTiy66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BAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpsD/ATQ/L8XfaE6lAAAAAElFTkSuQmCC">
                </a>
              </li>
              <li class="span3">
                <a href="#" class="thumbnail">
                  <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="data:image/png;base64,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bqQFAQIECBDoTkBA6K7kJkyAAAECBHIBASE30oIAAQIECHQnICB0V3ITJkCAAAECuYCAkBtpQYAAAQIEuhMQELoruQkTIECAAIFcQEDIjbQgQIAAAQLdCQgI3ZXchAkQIECAQC4gIORGWhAgQIAAge4EBITuSm7CBAgQIEAgFxAQciMtCBAgQIBAdwICQnclN2ECBAgQIJALCAi5kRYECBAgQKA7AQGhu5KbMAECBAgQyAUEhNxICwIECBAg0J2AgNBdyU2YAAECBAjkAgJCbqQFAQIECBDoTkBA6K7kJkyAAAECBHIBASE30oIAAQIECHQnICB0V3ITJkCAAAECuYCAkBtpQYAAAQIEuhMQELoruQkTIECAAIFcQEDIjbQgQIAAAQLdCQgI3ZXchAkQIECAQC4gIORGWhAgQIAAge4EBITuSm7CBAgQIEAgFxAQciMtCBAgQIBAdwICQnclN2ECBAgQIJALCAi5kRYECBAgQKA7AQGhu5KbMAECBAgQyAUEhNxICwIECBAg0J2AgNBdyU2YAAECBAjkAgJCbqQFAQIECBDoTkBA6K7kJkyAAAECBHIBASE30oIAAQIECHQnICB0V3ITJkCAAAECuYCAkBtpQWAu8Msvv8x+/vnn+f//9ddfsyOOOGJ23HHHzQ477LC1hP7444/Zt99+O/vtt99m//zzz+yQQw6ZnXDCCfP/1jliPD/++OPs77//nv/a4YcfPu9j3fGs85mrtI1xDWOK9kcfffTsf//73yq/Om/z008/zZ3jd6KfmM/xxx+/9rx2qs/KEBoSOMgCAsJBLoCP3/kC77///uztt9+e/fnnn5ODPfXUU2eXX375/ES41RGB4OWXX5599dVXk80OPfTQeT9nn332lv18/PHHszfffHP2+++/T7aLk+mVV145P6ke6CMCzwMPPDAPUMNx1VVXpXOKtjGv119/fb+dd7LPga6HzyOwPwICwv7o+d1dLRAnuyeeeGL2/fffrzTPyy67bHbBBRdMto1v+vv27ZuvGGTHKaecMrvhhhvmKwuLxyuvvDL76KOPsi7mP7/++utnp5122kptt6vRF198MXvuuec2dJcFhDB5/PHHZz/88MNKw4jwc84550y23ek+K01QIwI7REBA2CGFMIydJ/Dqq6/OPvzww7UGFisA55133obfiZWHhx9+eMO36qzTiy66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BAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpsD/ATQ/L8XfaE6lAAAAAElFTkSuQmCC">
                </a>
              </li>
              <li class="span3">
                <a href="#" class="thumbnail">
                  <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="data:image/png;base64,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bqQFAQIECBDoTkBA6K7kJkyAAAECBHIBASE30oIAAQIECHQnICB0V3ITJkCAAAECuYCAkBtpQYAAAQIEuhMQELoruQkTIECAAIFcQEDIjbQgQIAAAQLdCQgI3ZXchAkQIECAQC4gIORGWhAgQIAAge4EBITuSm7CBAgQIEAgFxAQciMtCBAgQIBAdwICQnclN2ECBAgQIJALCAi5kRYECBAgQKA7AQGhu5KbMAECBAgQyAUEhNxICwIECBAg0J2AgNBdyU2YAAECBAjkAgJCbqQFAQIECBDoTkBA6K7kJkyAAAECBHIBASE30oIAAQIECHQnICB0V3ITJkCAAAECuYCAkBtpQYAAAQIEuhMQELoruQkTIECAAIFcQEDIjbQgQIAAAQLdCQgI3ZXchAkQIECAQC4gIORGWhAgQIAAge4EBITuSm7CBAgQIEAgFxAQciMtCBAgQIBAdwICQnclN2ECBAgQIJALCAi5kRYECBAgQKA7AQGhu5KbMAECBAgQyAUEhNxICwIECBAg0J2AgNBdyU2YAAECBAjkAgJCbqQFAQIECBDoTkBA6K7kJkyAAAECBHIBASE30oIAAQIECHQnICB0V3ITJkCAAAECuYCAkBtpQWAu8Msvv8x+/vnn+f//9ddfsyOOOGJ23HHHzQ477LC1hP7444/Zt99+O/vtt99m//zzz+yQQw6ZnXDCCfP/1jliPD/++OPs77//nv/a4YcfPu9j3fGs85mrtI1xDWOK9kcfffTsf//73yq/Om/z008/zZ3jd6KfmM/xxx+/9rx2qs/KEBoSOMgCAsJBLoCP3/kC77///uztt9+e/fnnn5ODPfXUU2eXX375/ES41RGB4OWXX5599dVXk80OPfTQeT9nn332lv18/PHHszfffHP2+++/T7aLk+mVV145P6ke6CMCzwMPPDAPUMNx1VVXpXOKtjGv119/fb+dd7LPga6HzyOwPwICwv7o+d1dLRAnuyeeeGL2/fffrzTPyy67bHbBBRdMto1v+vv27ZuvGGTHKaecMrvhhhvmKwuLxyuvvDL76KOPsi7mP7/++utnp5122kptt6vRF198MXvuuec2dJcFhDB5/PHHZz/88MNKw4jwc84550y23ek+K01QIwI7REBA2CGFMIydJ/Dqq6/OPvzww7UGFisA55133obfiZWHhx9+eMO36qzTiy66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BAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpoCAULNuRk2AAAECBJoKCAhNeXVOgAABAgRqCggINetm1AQIECBAoKmAgNCUV+cECBAgQKCmgIBQs25GTYAAAQIEmgoICE15dU6AAAECBGoKCAg162bUBAgQIECgqYCA0JRX5wQIECBAoKaAgFCzbkZNgAABAgSaCggITXl1ToAAAQIEagoICDXrZtQECBAgQKCpgIDQlFfnBAgQIECgpsD/ATQ/L8XfaE6lAAAAAElFTkSuQmCC">
                </a>
              </li>
            </ul>
          </div>

          <h2>Highly customizable</h2>
          <p>With a bit of extra markup, it's possible to add any kind of HTML content like headings, paragraphs, or buttons into thumbnails.</p>
          <div class="row-fluid">
            <ul class="thumbnails">
              <li class="span4">
                <div class="thumbnail">
                  <img data-src="holder.js/300x200" alt="300x200" style="width: 300px; height: 200px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAGQCAYAAAByNR6YAAAfMUlEQVR4Xu3dh8/k9PEHYBNCCxDgKDlI6Hf0ooTe8rfTm4AD0buAhBY4OgQI4afZnxYte+st740vM9xjCSHxemfHz3wlPrK99gmHDx/+ebARIECAAAECBAikCZwgYKVZKkSAAAECBAgQmAkIWBYCAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1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">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
                  </div>
                </div>
              </li>
              <li class="span4">
                <div class="thumbnail">
                  <img data-src="holder.js/300x200" alt="300x200" style="width: 300px; height: 200px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAGQCAYAAAByNR6YAAAfMUlEQVR4Xu3dh8/k9PEHYBNCCxDgKDlI6Hf0ooTe8rfTm4AD0buAhBY4OgQI4afZnxYte+st740vM9xjCSHxemfHz3wlPrK99gmHDx/+ebARIECAAAECBAikCZwgYKVZKkSAAAECBAgQmAkIWBYCAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI5At8MUXXwyff/758O233w7//e9/Z+V///vfD2edddZw7rnnDieddNLOXxm1Pv300+HLL78cfvrpp1ndqHPmmWcO55133vCHP/yhRM2dm9jiA998881w+PDh4euvv/7F83e/+90vx37qqaduUeXXuxzPnjtj+QCB40RAwDpOBu0w+wm8//77wyuvvPJLCBg7ggsuuGC4+uqrh1NOOWXjQUZQe/HFF4fvvvtu7b4RMq6//vrhnHPO+Z/U3Pile9jh448/Hl599dXh+++/X/vpCK7XXXfdcPrpp2/8luPZcyOOHQgc5wIC1nG+ABx+TYHnnntu+Ne//rVTczfccMOwf//+0c989NFHw/PPP1++5k4Nbrnza6+9Nrz77rtb7v3/u11xxRWzf8a249lzJ0g7EzhOBQSs43TwDruuwF7CwPxo/va3vw379u074uDiEtZjjz02/Pzzzzsd+AknnDDccccdwxlnnHFMau7U3JY7f/DBB7OzdnvZLr744tnZweXtePbci6PPEDgeBQSs43HqjrmswF7/xz0/oJNPPnm47777hghGi9vjjz8+u+doL1uEqwhZx6LmXvpb95kff/xxeOihhzZeZl1X4/bbbx/++Mc/8swejnoEfuMCAtZvfMAOr5fAoUOHZjefL28Rbq666qrZ2am46X3dvVk33njj8Kc//emXEhGsImCt2iI4HDhwYBae3njjjVntVdtyyJii5hSTeuedd4bXX399ZekIjhdddNEQN7jH5cMIt2NGcfzzbYpjn6LmFJ5qEiCwvYCAtb2VPQlMKhCX7x544IHhP//5z6++J8LPPffcMyz+ui32iTMz8QvA5S1u0I7gMN8iYETQWN4irMUlxcXtmWeemf3CbnlbvlQ2Rc0pcMfO3F166aXDwYMHf/WVL7300hA/LFjelv2nOPYpak7hqSYBAtsLCFjbW9mTwKQCEZoefPDBIy5nXXbZZbOzTMvb2L1FcfYqzmLFFqHtiSeeOOLy4Ni9VWNnUuKxDXfdddfsTNcUNeOm/n//+9+zs0mLW5jEsSzfAxaPlXj22WeHuAS4+JnoLR5h8de//nUWPld5jl1Gjc/ef//9R4TWOOY49jCY4tinqDnpQlWcAIGtBASsrZjsRGB6gXgm1ZNPPnnEFy1f8pvvEI8IeOqpp47YfzFgxeMYHn300SNubl8XMuLM2A8//PCruhEy7r333tmjIKao+eabbw5vv/32SuRV94DFvvGZVduf//zn4dprr52dCVwVsBZ9lj8/dhYrHllx4YUXTnLsU3hOv1p9AwECmwQErE1C/k7gGAnE2Zh4TtPyzeTxK7Y4K7O8vffee7P9l7drrrlm+Mtf/jL7z3E/V9zXtbzFA0rjLM+qbeyy2s033zycf/75k9QcO4sz72/xERQR/h5++OGVN64vBse41BmXPJe3eQBbdexxb9s//vGPI/40D1hdPI/RkvU1BAisERCwLA8CDQXi7Mwjjzwyu0S2vN16663D2WefPfvPYyFj3VmcCG0R3pa3eciYomZ817pfUEbA/Pvf/z67HPjCCy8MH3744RH9RTC97bbbfvnFXxjFvWeLj6aIS4sRsFY9RDT2i7N9qx7CetNNNw3xQNcpjn2Kmg2XtJYJ/OYEBKzf3Egd0G9RIIJUnLmJ+5Q+++yz2a/e5q/NWTze+FXg4i/e4mGlcX/T8rZ8I/zi38duuJ4HrClqzr9/3aW/eOhnXKaLYLlqG3tm1bbrYey4Irjdfffdw2mnnTZ7+Gsnz22P3X4ECOQLCFj5pioSSBcYu3S1+EXxLsG4GTsuk823TWejVjU6FrDm94JNUXPex7qzSLHP/Cb75b7jF5bxS8vly6vbDiJenxPBbVVoDdd4tlicPZvi2Keoue1x248AgekEBKzpbFUmkCYwFnoWvyDu1YqzOIvbprNRuwSs+b1LU9Rc7GPXh62ue9r8NgOIX07GjwtWhav4fDx/7JJLLpmVmuLYp6i5zXHbhwCBaQUErGl9VSeQIrApYMXZlQgIy893yvyf9/y+rSlqLiOtu1S4vO/YYyy2gd/0PsHlM2NTHPsUNbc5dvsQIDCtgIA1ra/qBFIEtrlEOP+i+Q3Znc+4bLpUOD/Wo7k0+PLLLw///Oc/R+cTZ8bi0uDiJdfMMHSszgimLEBFCBDYWUDA2pnMBwgce4F4aGbc5B7/xPOvIhiMvdolAkE8s6r7PUObLhVGALrzzjtX/iJw3YSi7tNPPz3EfVdj24knnji7n23x6fmx7xT3S01R89ivUN9IgMCygIBlTRBoKjB2VmsxeIz96m3xWVnLh7/pLM0UNcdGEE+h/+qrr1b+OZ6sHr/u22WLV+HEw0TXbfFg03jUxapnj01x7FPU3MXEvgQITCMgYE3jqiqByQXiMlo8cHPVmZijeWbVpqeZ7+W5TZtqrsIae7L94r6Ll0M3gb/11ltD/LNuu/LKK4fLL798dJcpjn2Kmpss/J0AgekFBKzpjX0Dga0E4ozUJ5988qt948b1O+64Y/aKmlVbXOqK52Itb5uePB4PIo2zNKu2sSe5z8PM2NPMj6bmch8RHle9smd5v7gMGg8gXXW2aXHfda/iif3iUQzx4uszzzxz7aymOPYpam614OxEgMCkAgLWpLyKE9he4Pnnnx/iV22L2+I7APcSsHZ9z10EugceeGDlC4/3+i7CbWouH9suN/XH63viNT5j29gluPn+8evIeBXPNs/Q6uq5/Sq0JwECWQICVpakOgSOUmDs3qexy2Bxluf+++8/IgxFG/GewXjfYOzz2GOPrbwhPp74Hk9+X9zGLsvF/U5x0/f8QZ/ZNRd7GHuJ9TreMaOxcDevte6J9qu+r6PnUS5LHydAYI8CAtYe4XyMQLbABx98MLz44otHlI1ftMVlsPj34rbuJvf52abYfyy4nXPOOcMtt9zyq5pjlxyXX0MzRc1oJAJMnEGL9wjuso1dKox3EUavq7a41ypeir3Nd8VrcuI7unnuYmhfAgRyBQSsXE/VCOxZIB7BEDetr3qieISrAwcODPv27Zvd1B6hYezXdcv3Qq27WTxC1sGDB2fB5o033lh5P1cc0PLZrilqxveM3Qwff4t7xuIS3aoQGn9fvlS47bO0thnY/J622HeKY5+i5jbHZR8CBKYTELCms1WZwM4C8SLhuGfoaLZVl/7Gblzf5nsWLw8u7p9dc+zXdPGd89C4KTQtXirc9BytbY59vs9iwIr/ln3sU9Xc5RjtS4BAroCAleupGoGjEojLVfHruXiw6F625Ut58xp7DRvr3vOXWXPdvVLLDxRdd4/W4qXCsV/n7cV1OWBlHvuUM9rLsfoMAQI5AgJWjqMqBNIENr18eOyL5q9eGfv7pvfurfpc/Lpu//79o8eWVXPVLyjnX7rquA4dOjREgFq1xc39cZP/pvc37jKw5YAVn8069sU+pqi5y3HalwCBPAEBK89SJQJpAj/++OMQ78r7+OOPN9aMZzjFr+HiHqRNW5z9iXuY4l6mdVu8IiZCRdyjtWk72ppjjz6I7x27wT/uQ3vkkUdW3q82P+MVzxQbu8F90zEt//3GG28c4nEOy9vRHvuqPqaouevx2p8AgaMXELCO3lAFApMJxKXC+B9u/BOXpeIepNgiVMVDMeOm97hHatctasUZoLi5en45MsJM1DzvvPPK1Nz1uP5X+/P8X8n7XgJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1BQSsurPRGQECBAgQINBUQMBqOjhtEyBAgAABAnUFBKy6s9EZAQIECBAg0FRAwGo6OG0TIECAAAECdQUErLqz0RkBAgQIECDQVEDAajo4bRMgQIAAAQJ1Bf4PpadWc3tF4mcAAAAASUVORK5CYII=">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
                  </div>
                </div>
              </li>
              <li class="span4">
                <div class="thumbnail">
                  <img data-src="holder.js/300x200" alt="300x200" style="width: 300px; height: 200px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAGQCAYAAAByNR6YAAAfMUlEQVR4Xu3dh8/k9PEHYBNCCxDgKDlI6Hf0ooTe8rfTm4AD0buAhBY4OgQI4afZnxYte+st740vM9xjCSHxemfHz3wlPrK99gmHDx/+ebARIECAAAECBAikCZwgYKVZKkSAAAECBAgQmAkIWBYCAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1QIAAAQIECBBIFhCwkkGVI0CAAAECBAgIWNYAAQIECBAgQCBZQMBKBlWOAAECBAgQICBgWQMECBAgQIAAgWQBASsZVDkCBAgQIECAgIBlDRAgQIAAAQIEkgUErGRQ5QgQIECAAAECApY1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">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
                  </div>
                </div>
              </li>
            </ul>
          </div>

          <h3>Why use thumbnails</h3>
          <p>Thumbnails (previously <code>.media-grid</code> up until v1.4) are great for grids of photos or videos, image search results, retail products, portfolios, and much more. They can be links or static content.</p>

          <h3>Simple, flexible markup</h3>
          <p>Thumbnail markup is simple—a <code>ul</code> with any number of <code>li</code> elements is all that is required. It's also super flexible, allowing for any type of content with just a bit more markup to wrap your contents.</p>

          <h3>Uses grid column sizes</h3>
          <p>Lastly, the thumbnails component uses existing grid system classes—like <code>.span2</code> or <code>.span3</code>—for control of thumbnail dimensions.</p>

          <h2>Markup</h2>
          <p>As mentioned previously, the required markup for thumbnails is light and straightforward. Here's a look at the default setup <strong>for linked images</strong>:</p>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"thumbnails"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span4"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"thumbnail"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">      </span><span class="tag">&lt;img</span><span class="pln"> </span><span class="atn">data-src</span><span class="pun">=</span><span class="atv">"holder.js/300x200"</span><span class="pln"> </span><span class="atn">alt</span><span class="pun">=</span><span class="atv">""</span><span class="tag">&gt;</span></li><li class="L4"><span class="pln">    </span><span class="tag">&lt;/a&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L6"><span class="pln">  ...</span></li><li class="L7"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>
          <p>For custom HTML content in thumbnails, the markup changes slightly. To allow block level content anywhere, we swap the <code>&lt;a&gt;</code> for a <code>&lt;div&gt;</code> like so:</p>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"thumbnails"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span4"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"thumbnail"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">      </span><span class="tag">&lt;img</span><span class="pln"> </span><span class="atn">data-src</span><span class="pun">=</span><span class="atv">"holder.js/300x200"</span><span class="pln"> </span><span class="atn">alt</span><span class="pun">=</span><span class="atv">""</span><span class="tag">&gt;</span></li><li class="L4"><span class="pln">      </span><span class="tag">&lt;h3&gt;</span><span class="pln">Thumbnail label</span><span class="tag">&lt;/h3&gt;</span></li><li class="L5"><span class="pln">      </span><span class="tag">&lt;p&gt;</span><span class="pln">Thumbnail caption...</span><span class="tag">&lt;/p&gt;</span></li><li class="L6"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L8"><span class="pln">  ...</span></li><li class="L9"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

          <h2>More examples</h2>
          <p>Explore all your options with the various grid classes available to you. You can also mix and match different sizes.</p>
          <ul class="thumbnails">
            <li class="span4">
              <a href="#" class="thumbnail">
                <img data-src="holder.js/360x270" alt="360x270" style="width: 360px; height: 270px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAtAAAAIcCAYAAADffZlTAAAgAElEQVR4Xu3dCbMsRdEG4GZRRFQWkVVB3HBHRQQU8LcrAoqCK6KICioIiojKFXFDcyKGmDv0lpPnnuHefDqCML44NdVTTxZfvFNUV1/08ssvvzG4CBAgQIAAAQIECBBYJXCRAL3KSSMCBAgQIECAAAECGwEB2kQgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiBAgAABAgQIEBCgzQECBAgQIECAAAECCQEBOoGlKQECBAgQIECAAAEB2hwgQIAAAQIECBAgkBAQoBNYmhIgQIAAAQIECBAQoM0BAgQIECBAgAABAgkBATqBpSkBAgQIECBAgAABAdocIECAAAECBAgQIJAQEKATWJoSIECAAAECBAgQEKDNAQIECBAgQIAAAQIJAQE6gaUpAQIECBAgQIAAAQHaHCBAgAABAgQIECCQEBCgE1iaEiCwTuBf//rX8I9//GP497//vfnAf//73+Ed73jH8O53v3u49NJL13WyotUbb7wx/PWvfx3+/ve/D3HP7fWud71reN/73jfE/57EFeM4c+bM8M9//nOIe8YV44jxnNQ9TuJ7ru3jP//5z8Zstz6XXHLJZjzvfOc713bztml3odXnbQPrixAgMCkgQJscBAiciEAE2F/96lfDCy+8cFaY3e88Qtqtt9463HTTTcNFF1100L3jXr/4xS+G3//+928G2rGO4l4f/ehHh+uvv/6g+zz//PPDs88+uwnPU1cEz+j/tttuGy6//PKD7nMaH4ofMb/73e82/0R4nrrih84tt9yy+SfGNnVFaP3hD394cA3nxhzf9cYbbxxuvvnmWZoLqT6nMQfcgwCBkxMQoE/OUk8E2gr85je/GZ566qnU+COcffaznx0+8IEPpD53yL0iSH/xi19cHXBfffXV4dFHH92snGeuD3/4w8PHPvaxzEdOpW380PjpT386+2Nj/4vEj5tPfOITw4c+9KHR7xg/Yh588MG00doBx4+Sz33uc6PNL7T6rDXRjgCBt4+AAP32qYVvQuC8FPjZz362WdU89IqVxs985jOrPv70008PzzzzzKq2Y4Hwrrvu2mztmLtidfaRRx5Jhc3d/iJw3n777Qd9x3Pxod/+9rfDz3/+84O7Dq8vf/nLw8UXX3xWH7EC/c1vfvPUA/SFVp+DC+ODBAgc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BAgQIECAAAECdQEBum6oBwIECBAgQIAAgUYCAnSjYhsqAQIECBAgQIBAXUCArhvqgQABAgQIECBAoJGAAN2o2IZKgAABAgQIECBQFxCg64Z6IECAAAECBAgQaCQgQDcqtqESIECAAAECBAjUBQTouqEeCBAgQIAAAQIEGgkI0I2KbagECBAgQIAAAQJ1AQG6bqgHAgQIECBAgACBRgICdKNiGyoBAgQIECBAgEBdQICuG+qBAAECBAgQIECgkYAA3ajYhkqAAAECBAgQIFAXEKDrhnogQIAAAQIECBBoJCBANyq2oRIgQIAAAQIECNQFBOi6oR4IECBAgAABAgQaCQjQjYptqAQIECBAgAABAnUBAbpuqAcCBAgQIECAAIFGAgJ0o2IbKgECBAgQIECAQF1AgK4b6oEAAQIECBAgQKCRgADdqNiGSoAAAQIECBAgUBcQoOuGeiBAgAABAgQIEGgkIEA3KrahEiBAgAABAgQI1AUE6LqhHggQIECAAAECBBoJCNCNim2oBAgQIECAAAECdQEBum6oBwIECBAgQIAAgUYCAnSjYhsqAQIECBAgQIBAXUCArhvqgQABAgQIECBAoJGAAN2o2IZKgAABAgQIECBQFxCg64Z6IECAAAECBAgQaCQgQDcqtqESIECAAAECBAjUBf4HlUWzGEM9DskAAAAASUVORK5CYII=">
              </a>
            </li>
            <li class="span3">
              <a href="#" class="thumbnail">
                <img data-src="holder.js/260x120" alt="260x120" style="width: 260px; height: 120px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAggAAADwCAYAAABlopw+AAAVCUlEQVR4Xu3dh4/c1BYHYIcOCr1XIQQklNB7Ff85TUDoLfROINTQQfT3zkhG3ll770z27O7svZ+lp4cyd659vrOSf+O65+jRo/92FgIECBAgQIDAQGCPgODvgQABAgQIEJgXEBD8TRAgQIAAAQLrBAQEfxQECBAgQICAgOBvgAABAgQIECgLOIJQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCwEzgt99+63799dfZf//999/dSSed1O3du7c74YQTlhL6888/u++//777/fffu3///bfbs2dPd8YZZ8z+t8wS2/Pzzz93//zzz+xrJ5544myOZbdnmXUuMja2q9+mGH/qqad2xx133CJfTXVeVZ+FIQwksMMCAsION8DqV1/gk08+6T744IPur7/+Gt3Yc889t9u/f/9sR7jREoHgjTfe6L799tvRYccff/xsnosvvnjDeT7//PPuvffe6/7444/Rcaeffnp3/fXXd/H/271E4Hn00UdnAapfbrjhhmJNMTbLeZV9trsf1kdgMwICwmb0fLdqgdjZPffcc92PP/64UJ3XXnttd8UVV4yOjV/6Bw8enB0xKC3nnHNOd+utt86OLMwvb775ZvfZZ5+Vpph9fsstt3TnnXfeQmOzBn399dfdK6+8sma6UkDIdF51nyxn8xDYDgEBYTuUrWNXCrz11lvd4cOHl9r2OAJw2WWXrflOHHl44okn1vyqLk161VVXdfG/4XLkyJHu0KFDpa/+93kEjAceeKA7+eSTF/7OZgZGCHr22WfXnF6I+UoBIct51X02Y+u7BHZCQEDYCXXrXHmBOH/91FNPjf7ij/Ppw3Psw2Jip/zwww+vuQ7gpZdeGj2tENcMxHUMv/zyyzqPmOehhx6aXVcQS/zKfuyxx0ZPc8Q1B3FIf+zoxIUXXtgdOHBgS7x/+umn2fbEdRnffPNNF0cPxpaNAkKW8yr6bAm6SQlso4CAsI3YVrV7BD788MPu/fffX7fBcW7/kksume2Q45dv/GqdX66++uruyiuvnP1z7DyffvrpdTvv4Zi4JuHll19eN+amm27qLrjggtk8R48e7V588cV164qdf4SAWMYOr0eYicAS1zdkLnH9QxwVWeSUyUYBIct51Xwyrc1FYKcEBISdkrfelRaIQ+Xz1x704WC44XGNwg8//LCmluGv9o8//rh7991313we1xjcdttta/4tLl6Mi+uGy4033thddNFFs396++23u08//XRyPfHB2AWC8e9xPUNcSBl3TkSgGd5REEdC4jqF888/f83cX3755Wz8cImxcdojTlnEkYPHH3988kjK8HsbBYQs5wyflf6DtHEEdkBAQNgBdKtcfYFnnnlmdgthv0ydz49f/3EKYbjEzjh2yrGMnV646667Rm9pnD9t0e/IY8f/5JNPzm6LHC79jn/4b2NB4/LLL+/27ds3eRRi/nRGrCfWN390IMY9+OCDs9MiWUcQMpyzfFb/r9IWEtheAQFhe72tbRcIjP06jp31I488su7OgrGr9k877bTu3nvvnVUah+GHtyPGof445B/zxbUH/a2Tca1BfG9siecmxDzDABE76/vvv7875ZRT1nxl7JD98IjG2C/tmCBurYxf+rHEXQhj1xPcfPPNa440RDga3s4YNb366qsLX6SY5dxfBJrhswv+PG0igW0TEBC2jdqKdpNAHD2Y3/mNPVdg7AhBv7Md27HH4fn4PE49zP9Cj5AQt0rOPwdhbEcaFybGRYzzDyD67rvvuhdeeGENdfzij1/+ESpinfOhJQbHZ/fcc8/s8/hVP7/EtRBxTURp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">
              </a>
            </li>
            <li class="span2">
              <a href="#" class="thumbnail">
                <img data-src="holder.js/160x120" alt="160x120" style="width: 160px; height: 120px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUAAAADwCAYAAABxLb1rAAAOGUlEQVR4Xu3c95MUVRuG4cYAYirMEfnNUGaxzOFfR1TAnMoAapUEs66CAVTCV2/Xd7Z62tmdmRWFnec6VZS6s90zz/2+3J7TfXq2rKysnOsMBBBAIJDAFgIMrLrICCDQEyBAjYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgAD1AAIIxBIgwNjSC44AAgSoBxBAIJYAAcaWXnAEECBAPYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgAD1AAIIxBIgwNjSC44AAgSoBxBAIJYAAcaWXnAEECBAPYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgAD1AAIIxBIgwNjSC44AAgSoBxBAIJYAAcaWXnAEECBAPYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgAD1AAIIxBIgwNjSC44AAgSoBxBAIJYAAcaWXnAEECBAPYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgAD1AAIIxBIgwNjSC44AAgSoBxBAIJYAAcaWXnAEECBAPYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgAD1AAIIxBIgwNjSC44AAgSoBxBAIJYAAcaWXnAEECBAPYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgACXvAd++umn7ptvvukuueSSbvv27d1dd921ZuI//vijO3bsWFfHnDt3rrv00ku76667rj+m/n3aOHHiRH/+33//vX/58ssv72666ab+z5YtW8473UXy/Pzzz913333XnTp1auKz3XjjjWt+rv86z3kH5IQLESDAhXBtvl9+++23u5WVlf6DX3bZZd2LL744VUwlvk8++WRqwBLZ/fff3916662rr5cg33nnndVzjw8sYT799NPdFVdccV6hzZPn7Nmz3Wuvvdb99ttvU9+7JP344493V1111QXPc17hONnCBAhwYWSb54Cx1LZu3do9//zzfxPgDz/80L377rszgz3xxBPdtdde2/9eybLOv95Y6/1mvtEavzBvnjfffLOr2d96o6Regr7yyisvWJ6NcnDc+SNAgOeP5QU/U818Dh482P3555/d8ePH+38OxzQh1TEvvfRSd+bMmdVfraXyzTff3B05cqRfCrdx/fXXd4899lhXS+VXXnll4rU6Ztu2bX8Tz3333dfdcccdG2KzkTw//vhjPzMdjpqFVvZa3g5HLe937979n+XZEAQH/asECPBfxfvfnvyvv/7q9u7dOyGmWQIcz/5KFM8991x/zfDXX3/tDhw4sHqKtoT+6quvuo8//nj15zt27OiXlDUOHz7cffrpp6uvlWQeffTRXoztmmCJ7Zprruml1EZd22ujvV6/v2ieeu/6DG3UtciHH364/89vv/22++CDD1Zfq/PXJYH6+SJ5SprGchAgwOWoY59iIwKsGePRo0dXKZTISmht1HW0ElL9qWtntWR86623+hslbZRgSjQ1Tp8+3Uurfr9GSeaZZ57p9u3bNyHmmpU9++yz/etff/119+GHH05UomaONQtdVIDvvfde9/3336++d8m8ZqY1ajZbM9eawQ4/20cffbRQnpJm/c/A2PwECHDz13AiwS+//NLLp8RSQqxre20ZO20JXDO8munVqBsXNbspudVd3TpPXfO7/fbbJ+4CD4+p9ymRDW92jF8vAdYMcCy5e+65p7vzzju7PXv2TCzBhzPKRfPU8reWwW22Wdc820yzOJSIT548OSHAkmZjMG+eWvIbm58AAW7+Gq6ZYDwbW0+AteRts7bxCUsKDzzwQHfLLbf0L40FN5xlTXu9CXI8cyzh1iyvZoBt1Hu98MIL/WxzPObJs145py2B67OXNIcCnDfPErdOTDQCXOJSzxJGvf7yyy9PzL7Ww/HII4/0y+PhMcOlbDt2LMinnnqq33JSN2VqCbqWaOv42m5z2223Tf0Ys/Ks99lrK1CJbnhTp7JUpo3mWeLWiYlGgEtc6lnCqCVy/eUfC6mu85XY2v7Bhqh+VlthhhKbJcA6tmaPbQ/hl19+OXHDYYi/3WVeqySz8qx13BdffNF99tlnEy/XTPPJJ5/srw8OGSyaZ4nbJyIaAS5xmWcJY5oAd+7c2dW1uRr1FMX7778/sTyt2dwbb7zR3+yoMc81s/E1wuFm5nbyWg7X9br1bi7MyjMuZbsGWluCxqNmfvVESMm/brT8kzxL3EJLH40Al7jEs4QxvilQ1wHrDufwsbfXX399Yv9c7QM8dOjQxDWzuskxvCkw6ybJeKtMlaBmnXWe9casPMNja89fiXq45K3X242etqG7fjbtps0ieZa4hZY+GgEucYnnEcbwL/+05V9tEal9f208+OCD3eeff7767G/NAMdbTabdaW1CqS0or7766tTrgHffffe6zyrPk6c+51rvUVt1HnrooYknYUqQ+/fv33CeJW6fiGgEuMRlnkcYtTG47o625Wy7YVH/PW3fXC1nawZYy+M2htf4xk+J1IyrZpU1u6xRs7JpS9L2/uPl8rA88+Spz1zPAbe7uu28Jb62V3Fc8lrmbzTPErdPRDQCXOIyzyOM2jRc++DaqKVobYauLTPjmwdti0rtExxeG6wtK/VcbR0zlkltcyn51KgN17Xxer1x9dVX9zcnpn2TzDx5pr1HnbMex6trguOxa9euft/gRvIscevERCPAJS71PMKoGVM9C9xuAjQcJbWxMEoi9YTGtOeH20xrfM2tHoO74YYb+s3H46dB6oZLvTb+Ioa1lsLz5Gkboecpa3tKpe4Ej5+HnpVnnvP7nYufAAFe/DXa8CecRxh18truUndm1xslxLpL25ay621naedp21rWWpa2R8qG1yGbeIbf1NLONyvP+HreLHBNgHV9cpE8s87r9c1DgAA3T60W/qTjjc61vC2xTFte1pci1DJw2ibl9oUGTX7tg9S3xdSXD4xnffX68IZDLZnrKZDhuPfee/vH4GpMu2Nbm6FrU/RwzMpTn6P29I2/BWctcOMtPPPmWbgQDrhoCRDgRVuaC/PB6gZF+wKE+gQ1i2vfmTftE5Uw65j61uUSUC0na4vJtEfZLkyixd512fIslj7vtwkwr+YSI4DA/wkQoFZAAIFYAgQYW3rBEUCAAPUAAgjEEiDA2NILjgACBKgHEEAglgABxpZecAQQIEA9gAACsQQIMLb0giOAAAHqAQQQiCVAgLGlFxwBBAhQDyCAQCwBAowtveAIIECAegABBGIJEGBs6QVHAAEC1AMIIBBLgABjSy84AggQoB5AAIFYAgQYW3rBEUCAAPUAAgjEEiDA2NILjgACBKgHEEAglgABxpZecAQQIEA9gAACsQQIMLb0giOAAAHqAQQQiCVAgLGlFxwBBAhQDyCAQCwBAowtveAIIECAegABBGIJEGBs6QVHAAEC1AMIIBBLgABjSy84AggQoB5AAIFYAgQYW3rBEUCAAPUAAgjEEiDA2NILjgACBKgHEEAglgABxpZecAQQIEA9gAACsQQIMLb0giOAAAHqAQQQiCVAgLGlFxwBBAhQDyCAQCwBAowtveAIIECAegABBGIJEGBs6QVHAAEC1AMIIBBLgABjSy84AggQoB5AAIFYAgQYW3rBEUCAAPUAAgjEEiDA2NILjgACBKgHEEAglgABxpZecAQQIEA9gAACsQQIMLb0giOAAAHqAQQQiCVAgLGlFxwBBAhQDyCAQCwBAowtveAIIECAegABBGIJEGBs6QVHAAEC1AMIIBBLgABjSy84AggQoB5AAIFYAgQYW3rBEUCAAPUAAgjEEiDA2NILjgACBKgHEEAglgABxpZecAQQIEA9gAACsQQIMLb0giOAAAHqAQQQiCVAgLGlFxwBBAhQDyCAQCwBAowtveAIIECAegABBGIJEGBs6QVHAAEC1AMIIBBLgABjSy84AggQoB5AAIFYAgQYW3rBEUCAAPUAAgjEEiDA2NILjgACBKgHEEAglgABxpZecAQQIEA9gAACsQQIMLb0giOAAAHqAQQQiCVAgLGlFxwBBAhQDyCAQCwBAowtveAIIECAegABBGIJEGBs6QVHAAEC1AMIIBBLgABjSy84AggQoB5AAIFYAgQYW3rBEUCAAPUAAgjEEiDA2NILjgACBKgHEEAglgABxpZecAQQIEA9gAACsQQIMLb0giOAAAHqAQQQiCVAgLGlFxwBBAhQDyCAQCwBAowtveAIIECAegABBGIJEGBs6QVHAIH/AWOPiNkkEv3wAAAAAElFTkSuQmCC">
              </a>
            </li>
            <li class="span3">
              <a href="#" class="thumbnail">
                <img data-src="holder.js/260x120" alt="260x120" style="width: 260px; height: 120px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAggAAADwCAYAAABlopw+AAAVCUlEQVR4Xu3dh4/c1BYHYIcOCr1XIQQklNB7Ff85TUDoLfROINTQQfT3zkhG3ll770z27O7svZ+lp4cyd659vrOSf+O65+jRo/92FgIECBAgQIDAQGCPgODvgQABAgQIEJgXEBD8TRAgQIAAAQLrBAQEfxQECBAgQICAgOBvgAABAgQIECgLOIJQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCAAECBAg0JyAgNNdyBRMgQIAAgbKAgFA2MoIAAQIECDQnICA013IFEyBAgACBsoCAUDYyggABAgQINCcgIDTXcgUTIECAAIGygIBQNjKCwEzgt99+63799dfZf//999/dSSed1O3du7c74YQTlhL6888/u++//777/fffu3///bfbs2dPd8YZZ8z+t8wS2/Pzzz93//zzz+xrJ5544myOZbdnmXUuMja2q9+mGH/qqad2xx133CJfTXVeVZ+FIQwksMMCAsION8DqV1/gk08+6T744IPur7/+Gt3Yc889t9u/f/9sR7jREoHgjTfe6L799tvRYccff/xsnosvvnjDeT7//PPuvffe6/7444/Rcaeffnp3/fXXd/H/271E4Hn00UdnAapfbrjhhmJNMTbLeZV9trsf1kdgMwICwmb0fLdqgdjZPffcc92PP/64UJ3XXnttd8UVV4yOjV/6Bw8enB0xKC3nnHNOd+utt86OLMwvb775ZvfZZ5+Vpph9fsstt3TnnXfeQmOzBn399dfdK6+8sma6UkDIdF51nyxn8xDYDgEBYTuUrWNXCrz11lvd4cOHl9r2OAJw2WWXrflOHHl44okn1vyqLk161VVXdfG/4XLkyJHu0KFDpa/+93kEjAceeKA7+eSTF/7OZgZGCHr22WfXnF6I+UoBIct51X02Y+u7BHZCQEDYCXXrXHmBOH/91FNPjf7ij/Ppw3Psw2Jip/zwww+vuQ7gpZdeGj2tENcMxHUMv/zyyzqPmOehhx6aXVcQS/zKfuyxx0ZPc8Q1B3FIf+zoxIUXXtgdOHBgS7x/+umn2fbEdRnffPNNF0cPxpaNAkKW8yr6bAm6SQlso4CAsI3YVrV7BD788MPu/fffX7fBcW7/kksume2Q45dv/GqdX66++uruyiuvnP1z7DyffvrpdTvv4Zi4JuHll19eN+amm27qLrjggtk8R48e7V588cV164qdf4SAWMYOr0eYicAS1zdkLnH9QxwVWeSUyUYBIct51Xwyrc1FYKcEBISdkrfelRaIQ+Xz1x704WC44XGNwg8//LCmluGv9o8//rh7991313we1xjcdttta/4tLl6Mi+uGy4033thddNFFs396++23u08//XRyPfHB2AWC8e9xPUNcSBl3TkSgGd5REEdC4jqF888/f83cX3755Wz8cImxcdojTlnEkYPHH3988kjK8HsbBYQs5wyflf6DtHEEdkBAQNgBdKtcfYFnnnlmdgthv0ydz49f/3EKYbjEzjh2yrGMnV646667Rm9pnD9t0e/IY8f/5JNPzm6LHC79jn/4b2NB4/LLL+/27ds3eRRi/nRGrCfWN390IMY9+OCDs9MiWUcQMpyzfFb/r9IWEtheAQFhe72tbRcIjP06jp31I488su7OgrGr9k877bTu3nvvnVUah+GHtyPGof445B/zxbUH/a2Tca1BfG9siecmxDzDABE76/vvv7875ZRT1nxl7JD98IjG2C/tmCBurYxf+rHEXQhj1xPcfPPNa440RDga3s4YNb366qsLX6SY5dxfBJrhswv+PG0igW0TEBC2jdqKdpNAHD2Y3/mNPVdg7AhBv7Md27HH4fn4PE49zP9Cj5AQt0rOPwdhbEcaFybGRYzzDyD67rvvuhdeeGENdfzij1/+ESpinfOhJQbHZ/fcc8/s8/hVP7/EtRBxTURp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">
              </a>
            </li>
            <li class="span2">
              <a href="#" class="thumbnail">
                <img data-src="holder.js/160x120" alt="160x120" style="width: 160px; height: 120px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUAAAADwCAYAAABxLb1rAAAOGUlEQVR4Xu3c95MUVRuG4cYAYirMEfnNUGaxzOFfR1TAnMoAapUEs66CAVTCV2/Xd7Z62tmdmRWFnec6VZS6s90zz/2+3J7TfXq2rKysnOsMBBBAIJDAFgIMrLrICCDQEyBAjYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgAD1AAIIxBIgwNjSC44AAgSoBxBAIJYAAcaWXnAEECBAPYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgAD1AAIIxBIgwNjSC44AAgSoBxBAIJYAAcaWXnAEECBAPYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgAD1AAIIxBIgwNjSC44AAgSoBxBAIJYAAcaWXnAEECBAPYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgAD1AAIIxBIgwNjSC44AAgSoBxBAIJYAAcaWXnAEECBAPYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgAD1AAIIxBIgwNjSC44AAgSoBxBAIJYAAcaWXnAEECBAPYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgAD1AAIIxBIgwNjSC44AAgSoBxBAIJYAAcaWXnAEECBAPYAAArEECDC29IIjgAAB6gEEEIglQICxpRccAQQIUA8ggEAsAQKMLb3gCCBAgHoAAQRiCRBgbOkFRwABAtQDCCAQS4AAY0svOAIIEKAeQACBWAIEGFt6wRFAgACXvAd++umn7ptvvukuueSSbvv27d1dd921ZuI//vijO3bsWFfHnDt3rrv00ku76667rj+m/n3aOHHiRH/+33//vX/58ssv72666ab+z5YtW8473UXy/Pzzz913333XnTp1auKz3XjjjWt+rv86z3kH5IQLESDAhXBtvl9+++23u5WVlf6DX3bZZd2LL744VUwlvk8++WRqwBLZ/fff3916662rr5cg33nnndVzjw8sYT799NPdFVdccV6hzZPn7Nmz3Wuvvdb99ttvU9+7JP344493V1111QXPc17hONnCBAhwYWSb54Cx1LZu3do9//zzfxPgDz/80L377rszgz3xxBPdtdde2/9eybLOv95Y6/1mvtEavzBvnjfffLOr2d96o6Regr7yyisvWJ6NcnDc+SNAgOeP5QU/U818Dh482P3555/d8ePH+38OxzQh1TEvvfRSd+bMmdVfraXyzTff3B05cqRfCrdx/fXXd4899lhXS+VXXnll4rU6Ztu2bX8Tz3333dfdcccdG2KzkTw//vhjPzMdjpqFVvZa3g5HLe937979n+XZEAQH/asECPBfxfvfnvyvv/7q9u7dOyGmWQIcz/5KFM8991x/zfDXX3/tDhw4sHqKtoT+6quvuo8//nj15zt27OiXlDUOHz7cffrpp6uvlWQeffTRXoztmmCJ7Zprruml1EZd22ujvV6/v2ieeu/6DG3UtciHH364/89vv/22++CDD1Zfq/PXJYH6+SJ5SprGchAgwOWoY59iIwKsGePRo0dXKZTISmht1HW0ElL9qWtntWR86623+hslbZRgSjQ1Tp8+3Uurfr9GSeaZZ57p9u3bNyHmmpU9++yz/etff/119+GHH05UomaONQtdVIDvvfde9/3336++d8m8ZqY1ajZbM9eawQ4/20cffbRQnpJm/c/A2PwECHDz13AiwS+//NLLp8RSQqxre20ZO20JXDO8munVqBsXNbspudVd3TpPXfO7/fbbJ+4CD4+p9ymRDW92jF8vAdYMcCy5e+65p7vzzju7PXv2TCzBhzPKRfPU8reWwW22Wdc820yzOJSIT548OSHAkmZjMG+eWvIbm58AAW7+Gq6ZYDwb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">
              </a>
            </li>
          </ul>

        </section>




        <!-- Alerts
        ================================================== -->
        <section id="alerts">
          <div class="page-header">
            <h1>Alerts <small>Styles for success, warning, and error messages</small></h1>
          </div>

          <h2>Default alert</h2>
          <p>Wrap any text and an optional dismiss button in <code>.alert</code> for a basic warning alert message.</p>
          <div class="bs-docs-example">
            <div class="alert">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Warning!</strong> Best check yo self, you're not looking too good.
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"alert"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"button"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"close"</span><span class="pln"> </span><span class="atn">data-dismiss</span><span class="pun">=</span><span class="atv">"alert"</span><span class="tag">&gt;</span><span class="pln">&amp;times;</span><span class="tag">&lt;/button&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;strong&gt;</span><span class="pln">Warning!</span><span class="tag">&lt;/strong&gt;</span><span class="pln"> Best check yo self, you're not looking too good.</span></li><li class="L3"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Dismiss buttons</h3>
          <p>Mobile Safari and Mobile Opera browsers, in addition to the <code>data-dismiss="alert"</code> attribute, require an <code>href="#"</code> for the dismissal of alerts when using an <code>&lt;a&gt;</code> tag.</p>
          <pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"close"</span><span class="pln"> </span><span class="atn">data-dismiss</span><span class="pun">=</span><span class="atv">"alert"</span><span class="tag">&gt;</span><span class="pln">&amp;times;</span><span class="tag">&lt;/a&gt;</span></li></ol></pre>
          <p>Alternatively, you may use a <code>&lt;button&gt;</code> element with the data attribute, which we have opted to do for our docs. When using <code>&lt;button&gt;</code>, you must include <code>type="button"</code> or your forms may not submit.</p>
          <pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"button"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"close"</span><span class="pln"> </span><span class="atn">data-dismiss</span><span class="pun">=</span><span class="atv">"alert"</span><span class="tag">&gt;</span><span class="pln">&amp;times;</span><span class="tag">&lt;/button&gt;</span></li></ol></pre>

          <h3>Dismiss alerts via JavaScript</h3>
          <p>Use the <a href="./javascript.html#alerts">alerts jQuery plugin</a> for quick and easy dismissal of alerts.</p>


          <hr class="bs-docs-separator">


          <h2>Options</h2>
          <p>For longer messages, increase the padding on the top and bottom of the alert wrapper by adding <code>.alert-block</code>.</p>
          <div class="bs-docs-example">
            <div class="alert alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <h4>Warning!</h4>
              <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"alert alert-block"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"button"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"close"</span><span class="pln"> </span><span class="atn">data-dismiss</span><span class="pun">=</span><span class="atv">"alert"</span><span class="tag">&gt;</span><span class="pln">&amp;times;</span><span class="tag">&lt;/button&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;h4&gt;</span><span class="pln">Warning!</span><span class="tag">&lt;/h4&gt;</span></li><li class="L3"><span class="pln">  Best check yo self, you're not...</span></li><li class="L4"><span class="tag">&lt;/div&gt;</span></li></ol></pre>


          <hr class="bs-docs-separator">


          <h2>Contextual alternatives</h2>
          <p>Add optional classes to change an alert's connotation.</p>

          <h3>Error or danger</h3>
          <div class="bs-docs-example">
            <div class="alert alert-error">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Oh snap!</strong> Change a few things up and try submitting again.
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"alert alert-error"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Success</h3>
          <div class="bs-docs-example">
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Well done!</strong> You successfully read this important alert message.
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"alert alert-success"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Information</h3>
          <div class="bs-docs-example">
            <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"alert alert-info"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

        </section>




        <!-- Progress bars
        ================================================== -->
        <section id="progress">
          <div class="page-header">
            <h1>Progress bars <small>For loading, redirecting, or action status</small></h1>
          </div>

          <h2>Examples and markup</h2>

          <h3>Basic</h3>
          <p>Default progress bar with a vertical gradient.</p>
          <div class="bs-docs-example">
            <div class="progress">
              <div class="bar" style="width: 60%;"></div>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"progress"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">60</span><span class="pun">%;</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Striped</h3>
          <p>Uses a gradient to create a striped effect. Not available in IE7-8.</p>
          <div class="bs-docs-example">
            <div class="progress progress-striped">
              <div class="bar" style="width: 20%;"></div>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"progress progress-striped"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">20</span><span class="pun">%;</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Animated</h3>
          <p>Add <code>.active</code> to <code>.progress-striped</code> to animate the stripes right to left. Not available in all versions of IE.</p>
          <div class="bs-docs-example">
            <div class="progress progress-striped active">
              <div class="bar" style="width: 45%"></div>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"progress progress-striped active"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">40</span><span class="pun">%;</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Stacked</h3>
          <p>Place multiple bars into the same <code>.progress</code> to stack them.</p>
          <div class="bs-docs-example">
            <div class="progress">
              <div class="bar bar-success" style="width: 35%"></div>
              <div class="bar bar-warning" style="width: 20%"></div>
              <div class="bar bar-danger" style="width: 10%"></div>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"progress"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar bar-success"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">35</span><span class="pun">%;</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar bar-warning"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">20</span><span class="pun">%;</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar bar-danger"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">10</span><span class="pun">%;</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L4"><span class="tag">&lt;/div&gt;</span></li></ol></pre>


          <hr class="bs-docs-separator">


          <h2>Options</h2>

          <h3>Additional colors</h3>
          <p>Progress bars use some of the same button and alert classes for consistent styles.</p>
          <div class="bs-docs-example">
            <div class="progress progress-info" style="margin-bottom: 9px;">
              <div class="bar" style="width: 20%"></div>
            </div>
            <div class="progress progress-success" style="margin-bottom: 9px;">
              <div class="bar" style="width: 40%"></div>
            </div>
            <div class="progress progress-warning" style="margin-bottom: 9px;">
              <div class="bar" style="width: 60%"></div>
            </div>
            <div class="progress progress-danger">
              <div class="bar" style="width: 80%"></div>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"progress progress-info"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">20</span><span class="pun">%</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li><li class="L3"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"progress progress-success"</span><span class="tag">&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">40</span><span class="pun">%</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L5"><span class="tag">&lt;/div&gt;</span></li><li class="L6"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"progress progress-warning"</span><span class="tag">&gt;</span></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">60</span><span class="pun">%</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L8"><span class="tag">&lt;/div&gt;</span></li><li class="L9"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"progress progress-danger"</span><span class="tag">&gt;</span></li><li class="L0"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">80</span><span class="pun">%</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L1"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h3>Striped bars</h3>
          <p>Similar to the solid colors, we have varied striped progress bars.</p>
          <div class="bs-docs-example">
            <div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
              <div class="bar" style="width: 20%"></div>
            </div>
            <div class="progress progress-success progress-striped" style="margin-bottom: 9px;">
              <div class="bar" style="width: 40%"></div>
            </div>
            <div class="progress progress-warning progress-striped" style="margin-bottom: 9px;">
              <div class="bar" style="width: 60%"></div>
            </div>
            <div class="progress progress-danger progress-striped">
              <div class="bar" style="width: 80%"></div>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"progress progress-info progress-striped"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">20</span><span class="pun">%</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li><li class="L3"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"progress progress-success progress-striped"</span><span class="tag">&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">40</span><span class="pun">%</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L5"><span class="tag">&lt;/div&gt;</span></li><li class="L6"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"progress progress-warning progress-striped"</span><span class="tag">&gt;</span></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">60</span><span class="pun">%</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L8"><span class="tag">&lt;/div&gt;</span></li><li class="L9"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"progress progress-danger progress-striped"</span><span class="tag">&gt;</span></li><li class="L0"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"bar"</span><span class="pln"> </span><span class="atn">style</span><span class="pun">=</span><span class="atv">"</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">80</span><span class="pun">%</span><span class="atv">"</span><span class="tag">&gt;&lt;/div&gt;</span></li><li class="L1"><span class="tag">&lt;/div&gt;</span></li></ol></pre>


          <hr class="bs-docs-separator">


          <h2>Browser support</h2>
          <p>Progress bars use CSS3 gradients, transitions, and animations to achieve all their effects. These features are not supported in IE7-9 or older versions of Firefox.</p>
          <p>Versions earlier than Internet Explorer 10 and Opera 12 do not support animations.</p>

        </section>




        <!-- Media object
        ================================================== -->
        <section id="media">
          <div class="page-header">
            <h1>Media object</h1>
          </div>
          <p class="lead">Abstract object styles for building various types of components (like blog comments, Tweets, etc) that feature a left- or right-aligned image alongside textual content.</p>

          <h2>Default example</h2>
          <p>The default media allow to float a media object (images, video, audio) to the left or right of a content block.</p>
          <div class="bs-docs-example">
            <div class="media">
              <a class="pull-left" href="#">
                <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,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">
              </a>
              <div class="media-body">
                <h4 class="media-heading">Media heading</h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="#">
                <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAG/0lEQVR4Xu2d+U8USxDHC+VQQLmRQ+NPBhGIQCB4Rf92jngggkpAIMYQBIyigHiDwnvfzut9s8Muu9ayO5vqbycmMDPVdtX3M91VNSZWbG9vHwlHsBGoIADBau8cJwBh608AAtefABAAJoFBM8AcIGj5mQQGLj8BIADsA4TNAHOAsPVnGRi4/gSAALAPEDQDzAGClp9lYODyEwACwD5A2AwwBwhbf5aBgetPAAgA+wBBM8AcIGj5WQYGLj8BIADsA4TNAHOAsPVnGRi4/gSAALAPEDQDzAGClp9lYODyEwACwD5A2AwwBwhbf5aBgetPAAgA+wBBM8AcIGj5WQYGLj8BIADsA4TNAHOAsPVnGRi4/gSAALAPEDQDzAGClp9lYODyEwACwD5A2AwwBwhbf5aBgetPAAgA+wBBM1BWOcDPnz9lY2ND/k1MnShnz56VpqYmuXLlilRWVuYUCrZ//vxJPdfW1ibnz5/PaZfPA+W8tnzWn+2ZsgFgfX1dlpaWsvrS398vHR0dWe9D/FevXqXdv3HjhnR1dRUSH2dbzmsr1LmyAODjx4/y/PnznL6Mjo5KQ0PDsed+//4tExMTcnh4mHavr69POjs7c8570gPlvLaCHPvPOHEAsGVPTk4KRPQD23Z7e7usra3J0dH//69lS0uLDA0NHfN7fn5e3r9/f+x6oQCU89pOQ3zMkTgA8Tesurpa7t27J2fOnJGvX7/K48ePU74iJ3jw4IG758fu7q7MzMy4a9l2AFzf2dmRiooKZ4bfL1y4IDU1Nal5cN/D5u9/+fIlbWcqxtpOS0jtPIkDgHMfZ6wfIyMj0tjYmPr927dvLrGDOFVVVVJbW5u6h2sPHz6UHz9+uGu49/3799R9vwPs7++7XSa6m5w7d07u3r3roHj37p0sLCykxRD5w97eXtHXphXutOwSB+DRo0cCkTGQ6Q8PDwvearz9EOzixYsukcPbHx9v376V5eVldxlvJ0SL5hLRI2Bzc1MWFxfTpujp6ZHLly/L+Ph42hEEAAFiqdZ2WmJq5kkcAGzxEDvTFh51aGBgQC5dupS6hLd6amoqte3fvHnTQfD06dNjO4C/8OzZM3cU+AHgUCpiB/ADO8L9+/fdblPKtWnEOw2bRAE4ODhwIkZr95OcGhwclNbWVvfIixcvZGtry/1cX18vt27dcv2D2dnZrADEocn0d/ldo9RrOw0xNXMkCkA2QXCW44z2DSHvGK7duXNHPn/+LHib/YD4gCAXAHg+U7/Az9Pc3OyOIIwk1qYRsFCbsgMAXT+czRgfPnyQly9fpvkIACD+r1+/3PXu7m7p7e11P8cBiB8bfqK5uTn59OlT2rw4DlB9+I5jJgBKsbZCBf1b+0QBiGfxyANw/kbbvtPT0y4b9wMdQSRz0ZIPOwMGegnRfgLmwx+AgB6CH+gvrKyspMUKuw7g8iOptf2tgIU+nygAWHw0046WZt4xiI0M3g9k+igd4zX/SYGIVgPo6aN0zGR/7do1uXr1amqqUq+tUDE19okDEO/i3b59W+rq6pwveAuRJPrtHtfGxsYEu0K0ps/lePSbAKoE5BCZBioA9Ab8jlLqteXyoxj3Ewcgfs5jK0YNjpJudXVVXr9+nfLbl2goG+NvMO6hf/DmzZvU88gPUDqil4BjJdo3yBZMJJOADPOVcm3FEDefORMHAG9yvBGDhaMORykWHdGEL5Nzvi3s70WTQHQLsfVHdw4kdcgN4h+i/FFQqrXlI1SxnkkcADgWz94zOQsgkKVn6gj657OVgRDyyZMnruHkB95wfFfAzhA963Ef91Ba4igq9tqKJWy+85YFAFgsPgqh5MuUnOEfheArYPQjUCYHs5WB6P5F+wawvX79umsDY6DKQF4RHfiMjOSx2GvLV6hiPVc2AHgHkaDh24AHAeL7pLBYQch33nJeW74+xJ8rOwC0jtBOFwECoIubGSsCYEZKnSMEQBc3M1YEwIyUOkcIgC5uZqwIgBkpdY4QAF3czFgRADNS6hwhALq4mbEiAGak1DlCAHRxM2NFAMxIqXOEAOjiZsaKAJiRUucIAdDFzYwVATAjpc4RAqCLmxkrAmBGSp0jBEAXNzNWBMCMlDpHCIAubmasCIAZKXWOEABd3MxYEQAzUuocIQC6uJmxIgBmpNQ5QgB0cTNjRQDMSKlzhADo4mbGigCYkVLnCAHQxc2MFQEwI6XOEQKgi5sZKwJgRkqdIwRAFzczVgTAjJQ6RwiALm5mrAiAGSl1jhAAXdzMWBEAM1LqHCEAuriZsSIAZqTUOUIAdHEzY0UAzEipc4QA6OJmxooAmJFS5wgB0MXNjBUBMCOlzhECoIubGSsCYEZKnSMEQBc3M1YEwIyUOkcIgC5uZqwIgBkpdY78A7hAWkz2lAp/AAAAAElFTkSuQmCC">
              </a>
              <div class="media-body">
                <h4 class="media-heading">Media heading</h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <div class="media">
                  <a class="pull-left" href="#">
                    <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAG/0lEQVR4Xu2d+U8USxDHC+VQQLmRQ+NPBhGIQCB4Rf92jngggkpAIMYQBIyigHiDwnvfzut9s8Muu9ayO5vqbycmMDPVdtX3M91VNSZWbG9vHwlHsBGoIADBau8cJwBh608AAtefABAAJoFBM8AcIGj5mQQGLj8BIADsA4TNAHOAsPVnGRi4/gSAALAPEDQDzAGClp9lYODyEwACwD5A2AwwBwhbf5aBgetPAAgA+wBBM8AcIGj5WQYGLj8BIADsA4TNAHOAsPVnGRi4/gSAALAPEDQDzAGClp9lYODyEwACwD5A2AwwBwhbf5aBgetPAAgA+wBBM8AcIGj5WQYGLj8BIADsA4TNAHOAsPVnGRi4/gSAALAPEDQDzAGClp9lYODyEwACwD5A2AwwBwhbf5aBgetPAAgA+wBBM1BWOcDPnz9lY2ND/k1MnShnz56VpqYmuXLlilRWVuYUCrZ//vxJPdfW1ibnz5/PaZfPA+W8tnzWn+2ZsgFgfX1dlpaWsvrS398vHR0dWe9D/FevXqXdv3HjhnR1dRUSH2dbzmsr1LmyAODjx4/y/PnznL6Mjo5KQ0PDsed+//4tExMTcnh4mHavr69POjs7c8570gPlvLaCHPvPOHEAsGVPTk4KRPQD23Z7e7usra3J0dH//69lS0uLDA0NHfN7fn5e3r9/f+x6oQCU89pOQ3zMkTgA8Tesurpa7t27J2fOnJGvX7/K48ePU74iJ3jw4IG758fu7q7MzMy4a9l2AFzf2dmRiooKZ4bfL1y4IDU1Nal5cN/D5u9/+fIlbWcqxtpOS0jtPIkDgHMfZ6wfIyMj0tjYmPr927dvLrGDOFVVVVJbW5u6h2sPHz6UHz9+uGu49/3799R9vwPs7++7XSa6m5w7d07u3r3roHj37p0sLCykxRD5w97eXtHXphXutOwSB+DRo0cCkTGQ6Q8PDwvearz9EOzixYsukcPbHx9v376V5eVldxlvJ0SL5hLRI2Bzc1MWFxfTpujp6ZHLly/L+Ph42hEEAAFiqdZ2WmJq5kkcAGzxEDvTFh51aGBgQC5dupS6hLd6amoqte3fvHnTQfD06dNjO4C/8OzZM3cU+AHgUCpiB/ADO8L9+/fdblPKtWnEOw2bRAE4ODhwIkZr95OcGhwclNbWVvfIixcvZGtry/1cX18vt27dcv2D2dnZrADEocn0d/ldo9RrOw0xNXMkCkA2QXCW44z2DSHvGK7duXNHPn/+LHib/YD4gCAXAHg+U7/Az9Pc3OyOIIwk1qYRsFCbsgMAXT+czRgfPnyQly9fpvkIACD+r1+/3PXu7m7p7e11P8cBiB8bfqK5uTn59OlT2rw4DlB9+I5jJgBKsbZCBf1b+0QBiGfxyANw/kbbvtPT0y4b9wMdQSRz0ZIPOwMGegnRfgLmwx+AgB6CH+gvrKyspMUKuw7g8iOptf2tgIU+nygAWHw0046WZt4xiI0M3g9k+igd4zX/SYGIVgPo6aN0zGR/7do1uXr1amqqUq+tUDE19okDEO/i3b59W+rq6pwveAuRJPrtHtfGxsYEu0K0ps/lePSbAKoE5BCZBioA9Ab8jlLqteXyoxj3Ewcgfs5jK0YNjpJudXVVXr9+nfLbl2goG+NvMO6hf/DmzZvU88gPUDqil4BjJdo3yBZMJJOADPOVcm3FEDefORMHAG9yvBGDhaMORykWHdGEL5Nzvi3s70WTQHQLsfVHdw4kdcgN4h+i/FFQqrXlI1SxnkkcADgWz94zOQsgkKVn6gj657OVgRDyyZMnruHkB95wfFfAzhA963Ef91Ba4igq9tqKJWy+85YFAFgsPgqh5MuUnOEfheArYPQjUCYHs5WB6P5F+wawvX79umsDY6DKQF4RHfiMjOSx2GvLV6hiPVc2AHgHkaDh24AHAeL7pLBYQch33nJeW74+xJ8rOwC0jtBOFwECoIubGSsCYEZKnSMEQBc3M1YEwIyUOkcIgC5uZqwIgBkpdY4QAF3czFgRADNS6hwhALq4mbEiAGak1DlCAHRxM2NFAMxIqXOEAOjiZsaKAJiRUucIAdDFzYwVATAjpc4RAqCLmxkrAmBGSp0jBEAXNzNWBMCMlDpHCIAubmasCIAZKXWOEABd3MxYEQAzUuocIQC6uJmxIgBmpNQ5QgB0cTNjRQDMSKlzhADo4mbGigCYkVLnCAHQxc2MFQEwI6XOEQKgi5sZKwJgRkqdIwRAFzczVgTAjJQ6RwiALm5mrAiAGSl1jhAAXdzMWBEAM1LqHCEAuriZsSIAZqTUOUIAdHEzY0UAzEipc4QA6OJmxooAmJFS5wgB0MXNjBUBMCOlzhECoIubGSsCYEZKnSMEQBc3M1YEwIyUOkcIgC5uZqwIgBkpdY78A7hAWkz2lAp/AAAAAElFTkSuQmCC">
                  </a>
                  <div class="media-body">
                    <h4 class="media-heading">Media heading</h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
                </div>
              </div>
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"media"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pull-left"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;img</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"media-object"</span><span class="pln"> </span><span class="atn">data-src</span><span class="pun">=</span><span class="atv">"holder.js/64x64"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/a&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"media-body"</span><span class="tag">&gt;</span></li><li class="L5"><span class="pln">    </span><span class="tag">&lt;h4</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"media-heading"</span><span class="tag">&gt;</span><span class="pln">Media heading</span><span class="tag">&lt;/h4&gt;</span></li><li class="L6"><span class="pln">    ...</span></li><li class="L7"><span class="pln">&nbsp;</span></li><li class="L8"><span class="pln">    </span><span class="com">&lt;!-- Nested media object --&gt;</span></li><li class="L9"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"media"</span><span class="tag">&gt;</span></li><li class="L0"><span class="pln">      ...</span></li><li class="L1"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L3"><span class="tag">&lt;/div&gt;</span></li></ol></pre>


          <hr class="bs-docs-separator">


          <h2>Media list</h2>
          <p>With a bit of extra markup, you can use media inside list (useful for comment threads or articles lists).</p>
          <div class="bs-docs-example">
            <ul class="media-list">
              <li class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,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">
                </a>
                <div class="media-body">
                  <h4 class="media-heading">Media heading</h4>
                  <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                  <!-- Nested media object -->
                  <div class="media">
                    <a class="pull-left" href="#">
                      <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,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">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">Nested media heading</h4>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                      <!-- Nested media object -->
                      <div class="media">
                        <a class="pull-left" href="#">
                          <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,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">
                        </a>
                        <div class="media-body">
                          <h4 class="media-heading">Nested media heading</h4>
                          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Nested media object -->
                  <div class="media">
                    <a class="pull-left" href="#">
                      <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAG/0lEQVR4Xu2d+U8USxDHC+VQQLmRQ+NPBhGIQCB4Rf92jngggkpAIMYQBIyigHiDwnvfzut9s8Muu9ayO5vqbycmMDPVdtX3M91VNSZWbG9vHwlHsBGoIADBau8cJwBh608AAtefABAAJoFBM8AcIGj5mQQGLj8BIADsA4TNAHOAsPVnGRi4/gSAALAPEDQDzAGClp9lYODyEwACwD5A2AwwBwhbf5aBgetPAAgA+wBBM8AcIGj5WQYGLj8BIADsA4TNAHOAsPVnGRi4/gSAALAPEDQDzAGClp9lYODyEwACwD5A2AwwBwhbf5aBgetPAAgA+wBBM8AcIGj5WQYGLj8BIADsA4TNAHOAsPVnGRi4/gSAALAPEDQDzAGClp9lYODyEwACwD5A2AwwBwhbf5aBgetPAAgA+wBBM1BWOcDPnz9lY2ND/k1MnShnz56VpqYmuXLlilRWVuYUCrZ//vxJPdfW1ibnz5/PaZfPA+W8tnzWn+2ZsgFgfX1dlpaWsvrS398vHR0dWe9D/FevXqXdv3HjhnR1dRUSH2dbzmsr1LmyAODjx4/y/PnznL6Mjo5KQ0PDsed+//4tExMTcnh4mHavr69POjs7c8570gPlvLaCHPvPOHEAsGVPTk4KRPQD23Z7e7usra3J0dH//69lS0uLDA0NHfN7fn5e3r9/f+x6oQCU89pOQ3zMkTgA8Tesurpa7t27J2fOnJGvX7/K48ePU74iJ3jw4IG758fu7q7MzMy4a9l2AFzf2dmRiooKZ4bfL1y4IDU1Nal5cN/D5u9/+fIlbWcqxtpOS0jtPIkDgHMfZ6wfIyMj0tjYmPr927dvLrGDOFVVVVJbW5u6h2sPHz6UHz9+uGu49/3799R9vwPs7++7XSa6m5w7d07u3r3roHj37p0sLCykxRD5w97eXtHXphXutOwSB+DRo0cCkTGQ6Q8PDwvearz9EOzixYsukcPbHx9v376V5eVldxlvJ0SL5hLRI2Bzc1MWFxfTpujp6ZHLly/L+Ph42hEEAAFiqdZ2WmJq5kkcAGzxEDvTFh51aGBgQC5dupS6hLd6amoqte3fvHnTQfD06dNjO4C/8OzZM3cU+AHgUCpiB/ADO8L9+/fdblPKtWnEOw2bRAE4ODhwIkZr95OcGhwclNbWVvfIixcvZGtry/1cX18vt27dcv2D2dnZrADEocn0d/ldo9RrOw0xNXMkCkA2QXCW44z2DSHvGK7duXNHPn/+LHib/YD4gCAXAHg+U7/Az9Pc3OyOIIwk1qYRsFCbsgMAXT+czRgfPnyQly9fpvkIACD+r1+/3PXu7m7p7e11P8cBiB8bfqK5uTn59OlT2rw4DlB9+I5jJgBKsbZCBf1b+0QBiGfxyANw/kbbvtPT0y4b9wMdQSRz0ZIPOwMGegnRfgLmwx+AgB6CH+gvrKyspMUKuw7g8iOptf2tgIU+nygAWHw0046WZt4xiI0M3g9k+igd4zX/SYGIVgPo6aN0zGR/7do1uXr1amqqUq+tUDE19okDEO/i3b59W+rq6pwveAuRJPrtHtfGxsYEu0K0ps/lePSbAKoE5BCZBioA9Ab8jlLqteXyoxj3Ewcgfs5jK0YNjpJudXVVXr9+nfLbl2goG+NvMO6hf/DmzZvU88gPUDqil4BjJdo3yBZMJJOADPOVcm3FEDefORMHAG9yvBGDhaMORykWHdGEL5Nzvi3s70WTQHQLsfVHdw4kdcgN4h+i/FFQqrXlI1SxnkkcADgWz94zOQsgkKVn6gj657OVgRDyyZMnruHkB95wfFfAzhA963Ef91Ba4igq9tqKJWy+85YFAFgsPgqh5MuUnOEfheArYPQjUCYHs5WB6P5F+wawvX79umsDY6DKQF4RHfiMjOSx2GvLV6hiPVc2AHgHkaDh24AHAeL7pLBYQch33nJeW74+xJ8rOwC0jtBOFwECoIubGSsCYEZKnSMEQBc3M1YEwIyUOkcIgC5uZqwIgBkpdY4QAF3czFgRADNS6hwhALq4mbEiAGak1DlCAHRxM2NFAMxIqXOEAOjiZsaKAJiRUucIAdDFzYwVATAjpc4RAqCLmxkrAmBGSp0jBEAXNzNWBMCMlDpHCIAubmasCIAZKXWOEABd3MxYEQAzUuocIQC6uJmxIgBmpNQ5QgB0cTNjRQDMSKlzhADo4mbGigCYkVLnCAHQxc2MFQEwI6XOEQKgi5sZKwJgRkqdIwRAFzczVgTAjJQ6RwiALm5mrAiAGSl1jhAAXdzMWBEAM1LqHCEAuriZsSIAZqTUOUIAdHEzY0UAzEipc4QA6OJmxooAmJFS5wgB0MXNjBUBMCOlzhECoIubGSsCYEZKnSMEQBc3M1YEwIyUOkcIgC5uZqwIgBkpdY78A7hAWkz2lAp/AAAAAElFTkSuQmCC">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">Nested media heading</h4>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <a class="pull-right" href="#">
                  <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/png;base64,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">
                </a>
                <div class="media-body">
                  <h4 class="media-heading">Media heading</h4>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </div>
              </li>
            </ul>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"media-list"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"media"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"pull-left"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">      </span><span class="tag">&lt;img</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"media-object"</span><span class="pln"> </span><span class="atn">data-src</span><span class="pun">=</span><span class="atv">"holder.js/64x64"</span><span class="tag">&gt;</span></li><li class="L4"><span class="pln">    </span><span class="tag">&lt;/a&gt;</span></li><li class="L5"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"media-body"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">      </span><span class="tag">&lt;h4</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"media-heading"</span><span class="tag">&gt;</span><span class="pln">Media heading</span><span class="tag">&lt;/h4&gt;</span></li><li class="L7"><span class="pln">      ...</span></li><li class="L8"><span class="pln">&nbsp;</span></li><li class="L9"><span class="pln">      </span><span class="com">&lt;!-- Nested media object --&gt;</span></li><li class="L0"><span class="pln">      </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"media"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">        ...</span></li><li class="L2"><span class="pln">     </span><span class="tag">&lt;/div&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L5"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>

</section>





        <!-- Miscellaneous
        ================================================== -->
        <section id="misc">
          <div class="page-header">
            <h1>Miscellaneous <small>Lightweight utility components</small></h1>
          </div>

          <h2>Wells</h2>
          <p>Use the well as a simple effect on an element to give it an inset effect.</p>
          <div class="bs-docs-example">
            <div class="well">
              Look, I'm in a well!
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"well"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
          <h3>Optional classes</h3>
          <p>Control padding and rounded corners with two optional modifier classes.</p>
          <div class="bs-docs-example">
            <div class="well well-large">
              Look, I'm in a well!
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"well well-large"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
          <div class="bs-docs-example">
            <div class="well well-small">
              Look, I'm in a well!
            </div>
          </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"well well-small"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

          <h2>Close icon</h2>
          <p>Use the generic close icon for dismissing content like modals and alerts.</p>
          <div class="bs-docs-example">
            <p><button class="close" style="float: none;">×</button></p>
          </div>
          <pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"close"</span><span class="tag">&gt;</span><span class="pln">&amp;times;</span><span class="tag">&lt;/button&gt;</span></li></ol></pre>
          <p>iOS devices require an <code>href="#"</code> for click events if you would rather use an anchor.</p>
          <pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"close"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">&amp;times;</span><span class="tag">&lt;/a&gt;</span></li></ol></pre>

          <h2>Helper classes</h2>
          <p>Simple, focused classes for small display or behavior tweaks.</p>

          <h4>.pull-left</h4>
          <p>Float an element left</p>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="kwd">class</span><span class="pun">=</span><span class="str">"pull-left"</span></li></ol></pre>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="pun">.</span><span class="pln">pull</span><span class="pun">-</span><span class="pln">left </span><span class="pun">{</span></li><li class="L1"><span class="pln">  </span><span class="kwd">float</span><span class="pun">:</span><span class="pln"> left</span><span class="pun">;</span></li><li class="L2"><span class="pun">}</span></li></ol></pre>

          <h4>.pull-right</h4>
          <p>Float an element right</p>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="kwd">class</span><span class="pun">=</span><span class="str">"pull-right"</span></li></ol></pre>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="pun">.</span><span class="pln">pull</span><span class="pun">-</span><span class="pln">right </span><span class="pun">{</span></li><li class="L1"><span class="pln">  </span><span class="kwd">float</span><span class="pun">:</span><span class="pln"> right</span><span class="pun">;</span></li><li class="L2"><span class="pun">}</span></li></ol></pre>

          <h4>.muted</h4>
          <p>Change an element's color to <code>#999</code></p>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="kwd">class</span><span class="pun">=</span><span class="str">"muted"</span></li></ol></pre>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="pun">.</span><span class="pln">muted </span><span class="pun">{</span></li><li class="L1"><span class="pln">  color</span><span class="pun">:</span><span class="pln"> </span><span class="com">#999;</span></li><li class="L2"><span class="pun">}</span></li></ol></pre>

          <h4>.clearfix</h4>
          <p>Clear the <code>float</code> on any element</p>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="kwd">class</span><span class="pun">=</span><span class="str">"clearfix"</span></li></ol></pre>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="pun">.</span><span class="pln">clearfix </span><span class="pun">{</span></li><li class="L1"><span class="pln">  </span><span class="pun">*</span><span class="pln">zoom</span><span class="pun">:</span><span class="pln"> </span><span class="lit">1</span><span class="pun">;</span></li><li class="L2"><span class="pln">  </span><span class="pun">&amp;:</span><span class="pln">before</span><span class="pun">,</span></li><li class="L3"><span class="pln">  </span><span class="pun">&amp;:</span><span class="pln">after </span><span class="pun">{</span></li><li class="L4"><span class="pln">    display</span><span class="pun">:</span><span class="pln"> table</span><span class="pun">;</span></li><li class="L5"><span class="pln">    content</span><span class="pun">:</span><span class="pln"> </span><span class="str">""</span><span class="pun">;</span></li><li class="L6"><span class="pln">  </span><span class="pun">}</span></li><li class="L7"><span class="pln">  </span><span class="pun">&amp;:</span><span class="pln">after </span><span class="pun">{</span></li><li class="L8"><span class="pln">    clear</span><span class="pun">:</span><span class="pln"> both</span><span class="pun">;</span></li><li class="L9"><span class="pln">  </span><span class="pun">}</span></li><li class="L0"><span class="pun">}</span></li></ol></pre>

        </section>



      </div>
    </div>



<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:</b>
<?php echo CHtml::encode($model->title); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br />


<h2><?php echo CHtml::link(Yii::t('app', 'PageAssociations'), array('pageAssociation/admin')); ?></h2>
<ul>
	<?php
	if (is_array($model->pageAssociations))
		foreach ($model->pageAssociations as $foreignobj)
		{

			echo '<li>';
			echo CHtml::link($foreignobj->title, array('pageAssociation/view', 'id' => $foreignobj->id));

			echo ' ' . CHtml::link(Yii::t('app', 'Update'), array('pageAssociation/update', 'id' => $foreignobj->id), array('class' => 'edit'));
		}
	?></ul><p><?php
	echo CHtml::link(
	    Yii::t('app', 'Create'), array('pageAssociation/create', 'PageAssociation' => array('page_id' => $model->{$model->tableSchema->primaryKey}))
	);
	?></p>
<h2>
	<?php echo Yii::t('crud', 'Data') ?></h2>

<p>
	<?php
	$this->widget('TbDetailView', array(
		'data' => $model,
		'attributes' => array(
			'id',
			'title',
			'created',
			'modified',
		),
	));
	?></p>

