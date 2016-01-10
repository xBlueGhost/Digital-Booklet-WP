<?php

global $wpdb;

function debug($v)
{
    echo '<pre>';
    print_r($v);
    echo '</pre>';
}

function getSchoolingType($speciality_num, $semester_num, $lang_num)
{
    global $wpdb;
    
    return $wpdb->get_results("
    
        SELECT * FROM {$wpdb->prefix}edb_schoolings
        JOIN          {$wpdb->prefix}edb_schooling_types USING(schooling_type_num)
        WHERE lang_num       = $lang_num
        AND   speciality_num = $speciality_num
        AND   semester_num   = $semester_num
        ORDER BY schooling_type_order
    
    ");
}

function getUEs($speciality_num, $semester_num, $schooling_type_num, $lang_num)
{    
    global $wpdb;
    
    return $wpdb->get_results("
    
        SELECT * FROM {$wpdb->prefix}edb_schoolings
        JOIN          {$wpdb->prefix}edb_ues USING(ue_num)
        JOIN          {$wpdb->prefix}edb_ues_langs USING(ue_num)
        WHERE lang_num           = $lang_num
        AND   speciality_num     = $speciality_num
        AND   semester_num       = $semester_num
        AND   schooling_type_num = $schooling_type_num
        ORDER BY ue_order
    
    ");
}

$edblang      = isset($_GET['edblang']) && !empty($_GET['edblang']) ? $_GET['edblang'] : 'FR';
$lang_num     = $wpdb->get_row("SELECT lang_num FROM {$wpdb->prefix}edb_langs WHERE lang_code = '$edblang'")->lang_num;
$langs        = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_langs");
$specialities = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_specialities JOIN {$wpdb->prefix}edb_specialities_langs USING(speciality_num) WHERE lang_num = $lang_num ORDER BY speciality_order");
$semesters    = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_semesters    JOIN {$wpdb->prefix}edb_semesters_langs    USING(semester_num)   WHERE lang_num = $lang_num ORDER BY semester_order");

?>

<nav class="edb_flags">
	<?php foreach ($langs as $lang): ?>
	
	<a href="<?php echo esc_url(add_query_arg('edblang', $lang->lang_code)); ?>"><img src="<?php echo plugins_url('assets/img/flags/' . $lang->lang_code . '.png', __FILE__); ?>" alt="<?php echo $lang->lang_name; ?>"></a>
	
	<?php endforeach; ?>
</nav>

<div id="edb" class="specialities">	
    
    <?php foreach ($specialities as $speciality): ?>
    
    <div class="item speciality">
        <a href="#<?php echo sanitize_title($speciality->speciality_name); ?>" class="accordion_title"><?php echo $speciality->speciality_name; ?></a>
        
        <div id="<?php echo sanitize_title($speciality->speciality_name); ?>" class="accordion_content">
            <div class="semesters">
                <?php foreach ($semesters as $semester): ?>
                
                <div class="item semester">
                    <a href="#<?php echo sanitize_title($semester->semester_name); ?>" class="accordion_title"><?php echo $semester->semester_name; ?></a>
                    
                    <div id="<?php echo sanitize_title($semester->semester_name); ?>" class="accordion_content">                        
                        <?php $i = 0; foreach (getSchoolingType($speciality->speciality_num, $semester->semester_num, $lang_num) as $schooling_type): $i++; ?>
                        
                        <table class="ue_list <?php echo $i == 2 ? 'major' : ''; ?>">
                            <thead>
                                <tr>
                                    <th width="46%"><?php echo $schooling_type->schooling_type_name; ?></th>
                                    <th width="18%">Code</th>
                                    <th width="18%">Moyenne mini</th>
                                    <th width="18%">ECTS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (getUEs($speciality->speciality_num, $semester->semester_num, $schooling_type->schooling_type_num, $lang_num) as $ue): ?>
                                
                                <tr>
                                    <td><?php echo $ue->ue_wording; ?></td>
                                    <td><?php echo $ue->ue_code; ?></td>
                                    <td><?php echo $ue->ue_average_min; ?></td>
                                    <td><?php echo $ue->ue_ects; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Module</td>
                                                    <td>Code</td>
                                                    <td colspan="3">Nb heures</td>
                                                    <td colspan="3">Coefficients</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td>Cours</td>
                                                    <td>TD</td>
                                                    <td>TP</td>
                                                    <td>Partiel</td>
                                                    <td>Exam</td>
                                                    <td>TP</td>
                                                </tr>
                                                <tr>
                                                    <td>Anglais</td>
                                                    <td>2L2AA1</td>
                                                    <td>-</td>
                                                    <td>30</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>3</td>
                                                    <td>-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>                              
                                
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <?php endforeach; ?>
    
	<!--
    <div class="item speciality active">
		<a href="#speciality_1" class="accordion_title">Hello World</a>
		
		<div id="#speciality_1" class="accordion_content">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, tempore magni. Quae mollitia dolore, saepe doloribus. Id, quasi. Ratione ad nemo minus repellendus excepturi odio, quasi odit iste doloribus incidunt.</p>
			<p>Mollitia beatae cumque dolores quas explicabo rem repudiandae, aut commodi, eos, accusantium, provident veniam laborum ratione. Vel unde, eaque voluptatem minima reprehenderit eligendi. Eius sit, beatae provident, eaque odio tempore!</p>
		</div>
	</div>
	<div class="item speciality">
		<a href="#speciality_2" class="accordion_title">Hello World</a>
		
		<div id="#speciality_2" class="accordion_content">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, tempore magni. Quae mollitia dolore, saepe doloribus. Id, quasi. Ratione ad nemo minus repellendus excepturi odio, quasi odit iste doloribus incidunt.</p>
			<p>Mollitia beatae cumque dolores quas explicabo rem repudiandae, aut commodi, eos, accusantium, provident veniam laborum ratione. Vel unde, eaque voluptatem minima reprehenderit eligendi. Eius sit, beatae provident, eaque odio tempore!</p>
		</div>
	</div>
    -->
</div>