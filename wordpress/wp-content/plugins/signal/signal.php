<?php
/*
Plugin Name: Signal
Plugin URI: https://github.com/
Description: Plugin de signal personnalisé pour WordPress
Version: 1.0
Author: hassan nouhi
Author URI: https://github.com/hassannh
*/
// Fonction d'activation du plugin
function plugin_activation()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'signal';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        Last_Name varchar(255) NOT NULL,
        First_Name varchar(255) NOT NULL,
        Email varchar(255) NOT NULL,
        type_signal varchar(255) NOT NULL,
        raison_signal varchar(255) NOT NULL,
        commente varchar(255) NOT NULL,
        date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'plugin_activation');

// Fonction de désactivation du plugin
function plugin_desactivation()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'signal';

    $wpdb->query("DROP TABLE IF EXISTS $table_name");
}
register_deactivation_hook(__FILE__, 'plugin_desactivation');
function signal_add_menu_page()
{
    add_menu_page(
        __('Signal', 'textdomain'),
        'Signal',
        'manage_options',
        'Signal',
        '',
        'dashicons-admin-plugins',
        6
    );
    add_submenu_page(
        'Signal',
        __('Books Shortcode Reference', 'textdomain'),
        __('Shortcode Reference', 'textdomain'),
        'manage_options',
        'Signal',
        'Signal_callback'
    );
}
add_action('admin_menu', 'signal_add_menu_page');

function Signal_callback()
{
    ?>
    <style>
        .form{
            margin-top: 10rem;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 50%;
            margin: 0 25%;
            justify-content: center;
        }

        form div {
            display: flex;
            flex-direction: row;
            justify-content: start;
        }

        form div label,
        form div input {
            cursor: pointer;
        }

        .Submit {
            background-color: #0d6efd;
            color: black;
            font-size: 1rem;
            width: 6rem;
            display: flex;
            justify-content: center;
            border: 1px solid;
            border-radius: 7px;
            cursor: pointer;
        }

        .Submit:hover {
            color: aliceblue;
        }
    </style>
    <form class="form" id="form">
        <div>
            <input type="radio" name="Last_Name" id="nom">
            <label class="labelForm" for="Last_Name">Last_Name:</label>
        </div>
        <div>
            <input type="radio" name="First_Name" id="prenom">
            <label class="labelForm" for="First_Name">First_name:</label>
        </div>
        <div>
            <input type="radio" name="Email" id="email">
            <label class="labelForm" for="Email">Email:</label>
        </div>
        <div>
            <input type="radio" name="type_signal" id="type_signal">
            <label class="labelForm" for="type_signal">le type de signal:</label>
        </div>
        <div>
            <input type="radio" name="raison_signal" id="raison_signal">
            <label class="labelForm" for="raison_signal">le raison de votre signal:</label>
        </div>
        <div>
            <input type="radio" name="commente" id="commente">
            <label class="labelForm" for="commente">commente:</label>
        </div>
        <div>
            <input class="Submit" type="submit" value="Save">
        </div>
    </form>
    <script>
        var form = document.getElementById('form')
        form.addEventListener('submit', event => {
            event.preventDefault();
            const formData = new FormData(form);
            const data = Object.fromEntries(formData);
            if (data.Last_Name == 'on') {
                var nomInput = `<div>
                                    <label for="Last_Name">Last_Name:</label>
                                    <input type="text" name="Last_Name" id="Last_Name">
                                </div>`
            } else {
                var nomInput = `<input type="hidden" value=' ' name="Last_Name" id="nom">`
            }
            if (data.First_Name == 'on') {
                var prenomInput = `<div>
                                    <label for="First_Name">First_Name:</label>
                                    <input type="text" name="First_Name" id="prenom">
                                </div>`
            } else {
                var prenomInput = `<input type="hidden" value=' ' name="First_Name" id="prenom">`
            }
            if (data.Email == 'on') {
                var emailInput = `<div>
                                    <label for="Email">Email:</label>
                                    <input type="email" name="Email" id="Email">
                                </div>`
            } else {
                var emailInput = `<input type="hidden" value=' ' name="Email" id="Email">`
            }
            if (data.type_signal == 'on') {
                var typeInput = `<div>
                                    <label for="type_signal">type de signal:</label>
                                    <select name="type_signal" id="type_signal">
                                        <option value="type 1">type 1</option>
                                        <option value="type 2">type 2</option>
                                        <option value="type 3">type 3</option>
                                    </select>
                                </div>`
            } else {
                var typeInput = `<input type="hidden" value=' ' name="type_signal" id="type_signal">`
            }
            if (data.raison_signal == 'on') {
                var raisonInput = `<div>
                                    <label for="raison_signal">raison de signal:</label>
                                    <select name="raison_signal" id="raison_signal">
                                        <option value="raison 1">raison 1</option>
                                        <option value="raison 2">raison 2</option>
                                        <option value="raison 3">raison 3</option>
                                    </select>
                                </div>`
            } else {
                var raisonInput = `<input type="hidden" value=' ' name="raison_signal" id="raison_signal">`
            }
            if (data.commente == 'on') {
                var commenteInput = `<div>
                                    <label for="commente">commente:</label>
                                    <textarea style="resize:none" name="commente" id="commente" cols="30" rows="10"></textarea>
                                </div>`
            } else {
                var commenteInput = `<input type="hidden" value=' ' name="commente" id="commente">`
            }
            var formSelected = `<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                    ${nomInput}
                                    ${prenomInput}
                                    ${emailInput}
                                    ${typeInput}
                                    ${raisonInput}
                                    ${commenteInput}
                                    <div>
                                        <input type="hidden" name="action" value="mon_plugin_register">
                                        <input class="Submit" type="submit" value="Envoyer">
                                    </div>
                                </form>`
            localStorage.setItem("formSelected",formSelected)
        })
    </script>
    <?php
}
function mon_plugin_shortcode_signal()
{
    ob_start();
    ?>
    <style>
        p form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 50%;
            margin: 0 25%;
        }

        p form div {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .Submit {
            background-color: #0d6efd;
            color: black;
            font-size: 1rem;
            width: 6rem;
            display: flex;
            justify-content: center;
            border: 1px solid;
            border-radius: 7px;
            cursor: pointer;
        }
        .Submit:hover{
            color: aliceblue;
        }
    </style>
    <p id="p"></p>
    <script>
        var p = document.getElementById('p')
        var formSelected = localStorage.getItem("formSelected")
        p.innerHTML = formSelected
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('form_signal', 'mon_plugin_shortcode_signal');
function mon_plugin_register()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'signal';


    $nom = $_POST['Last_Name'];
    $prenom = $_POST['First_Name'];
    $email = $_POST['Email'];
    $type_signal = $_POST['type_signal'];
    $raison_signal = $_POST['raison_signal'];
    $commente = $_POST['commente'];

    $wpdb->insert(
        $table_name,
        array(
            'Last_Name' => $nom,
            'First_Name' => $prenom,
            'Email' => $email,
            'type_signal' => $type_signal,
            'raison_signal' => $raison_signal,
            'commente' => $commente
        )
    );

    wp_redirect(home_url(''));
    exit;
}
add_action('admin_post_mon_plugin_register', 'mon_plugin_register');
function affiche_signal_add_menu_page()
{
    add_menu_page(
        __('affiche_Signal', 'textdomain'),
        'affiche_Signal',
        'manage_options',
        'affiche_Signal',
        '',
        'dashicons-admin-home',
        6
    );
    add_submenu_page(
        'affiche_Signal',
        __('Books Shortcode Reference', 'textdomain'),
        __('Shortcode Reference', 'textdomain'),
        'manage_options',
        'affiche_Signal',
        'affiche_Signal_callback'
    );
}
add_action('admin_menu', 'affiche_signal_add_menu_page');

function affiche_Signal_callback()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'signal';

    $results = $wpdb->get_results( "SELECT * FROM $table_name");
    ?>
        <table>
            <tr>
                <td>Last_Name</td>
                <td>First_Name</td>
                <td>Email</td>
                <td>type_signal</td>
                <td>raison_signal</td>
                <td>commente</td>
                <td>date</td>
            </tr>
            <?php foreach ($results as $result) {?>
            <tr>
                <td><?=$result->Last_Name?></td>
                <td><?=$result->First_Name?></td>
                <td><?=$result->Email?></td>
                <td><?=$result->type_signal?></td>
                <td><?=$result->raison_signal?></td>
                <td><?=$result->commente?></td>
                <td><?=$result->date?></td>
            </tr>
            <?php }?>
        </table>
        <?php
}
?>
