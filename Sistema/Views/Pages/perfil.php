<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <?php include('includes/metatags.php') ?>
    <script src="<?php echo INCLUDE_PATH_STATIC ?>js/toastr.js"></script>
    <script>
        function _0x5e9a(_0x3b0914, _0x2f21dc) { var _0x3751ed = _0xce6c(); return _0x5e9a = function (_0x3ce6e9, _0x27c6f5) { _0x3ce6e9 = _0x3ce6e9 - (0x1d88 + 0x242d + -0x414a); var _0xe90838 = _0x3751ed[_0x3ce6e9]; return _0xe90838; }, _0x5e9a(_0x3b0914, _0x2f21dc); } function _0xce6c() { var _0x4d0148 = ['2000', '3NQCLdM', 'options', 'linear', '803160SPjBmA', '30556uLBESI', '500', '1511258lullwy', '1fMAmZU', '1000', 'toast-top-', '27144DzZNKY', 'fadeOut', '1261064AfEEwf', '269350yzqsmC', '140vwNxCD', '515JwFYBY', '676181CrWqtI', 'right', 'swing', 'fadeIn']; _0xce6c = function () { return _0x4d0148; }; return _0xce6c(); } var _0x4a8fb1 = _0x5e9a; (function (_0xb3bbe2, _0x28204f) { var _0x34a0ca = _0x5e9a, _0x120054 = _0xb3bbe2(); while (!![]) { try { var _0x2d0929 = parseInt(_0x34a0ca(0x70)) / (-0x215 + -0xb14 + -0x151 * -0xa) * (parseInt(_0x34a0ca(0x76)) / (0x14fe + 0x2 * 0x1162 + -0x1 * 0x37c0)) + -parseInt(_0x34a0ca(0x7e)) / (-0x1 * 0x81a + 0x2ad + 0x570) * (parseInt(_0x34a0ca(0x6d)) / (-0x1ebd + 0x59b + -0x6f * -0x3a)) + -parseInt(_0x34a0ca(0x78)) / (-0x3 * 0x11b + -0x137c + 0x16d2) * (parseInt(_0x34a0ca(0x73)) / (0x3bb * 0x3 + -0x1fed + 0x14c2)) + -parseInt(_0x34a0ca(0x6f)) / (-0x335 * 0x3 + -0xa61 * -0x2 + 0x58e * -0x2) + -parseInt(_0x34a0ca(0x75)) / (-0x134c + -0x20e6 + 0x343a) + parseInt(_0x34a0ca(0x6c)) / (0x87 * -0x5 + -0x349 * -0x3 + -0x265 * 0x3) + parseInt(_0x34a0ca(0x77)) / (0x1fc9 + -0x1a67 + -0x156 * 0x4) * (parseInt(_0x34a0ca(0x79)) / (-0x132c + 0x273 + 0x10c4)); if (_0x2d0929 === _0x28204f) break; else _0x120054['push'](_0x120054['shift']()); } catch (_0xaf10b8) { _0x120054['push'](_0x120054['shift']()); } } }(_0xce6c, 0x245b0 + -0x1 * -0x54092 + -0x1 * 0x3e707), toastr[_0x4a8fb1(0x7f)] = toastr[_0x4a8fb1(0x7f)] = { 'closeButton': !![], 'debug': ![], 'newestOnTop': ![], 'progressBar': !![], 'positionClass': _0x4a8fb1(0x72) + _0x4a8fb1(0x7a), 'preventDuplicates': !![], 'onclick': null, 'showDuration': _0x4a8fb1(0x6e), 'hideDuration': _0x4a8fb1(0x6e), 'timeOut': _0x4a8fb1(0x7d), 'extendedTimeOut': _0x4a8fb1(0x71), 'showEasing': _0x4a8fb1(0x7b), 'hideEasing': _0x4a8fb1(0x6b), 'showMethod': _0x4a8fb1(0x7c), 'hideMethod': _0x4a8fb1(0x74) });

    </script>
</head>

<body>
    <section class=" main-feed">

        <?php include('includes/sidebar.php') ?>

        <div class="feed">


            <div class="editar-perfil">
                <h2>EDITANDO PERFIL</h2>
                <br>
                <br>
                <br>
                <?php if (isset($_SESSION['img']) && $_SESSION['img'] == '') {
                    echo '<div class="imagem"> <img src="' . INCLUDE_PATH_STATIC . 'images/avatar.png"/></div>';
                } else {
                    echo '<div class="imagem"> <img src="' . INCLUDE_PATH . 'images/' . $_SESSION['img'] . '"/></div>';


                }

                ?>
                <br>

                <form method="post" enctype="multipart/form-data">
                    <?php if (isset($_SESSION['msgPerfil'])) {
                        echo $_SESSION['msgPerfil'];
                        unset($_SESSION['msgPerfil']);
                    } ?>
                    <script>
                        (function (_0x40235c, _0xe630b5) { var _0x31b701 = _0x12bd, _0x297484 = _0x40235c(); while (!![]) { try { var _0x2cd082 = -parseInt(_0x31b701(0x1ae)) / 0x1 + parseInt(_0x31b701(0x1bd)) / 0x2 + -parseInt(_0x31b701(0x1ac)) / 0x3 + -parseInt(_0x31b701(0x1b2)) / 0x4 * (parseInt(_0x31b701(0x1ab)) / 0x5) + parseInt(_0x31b701(0x1b1)) / 0x6 + parseInt(_0x31b701(0x1bf)) / 0x7 * (parseInt(_0x31b701(0x1c1)) / 0x8) + parseInt(_0x31b701(0x1be)) / 0x9 * (-parseInt(_0x31b701(0x1b3)) / 0xa); if (_0x2cd082 === _0xe630b5) break; else _0x297484['push'](_0x297484['shift']()); } catch (_0x453121) { _0x297484['push'](_0x297484['shift']()); } } }(_0x2c8e, 0xbaafb)); var _0x1284bf = _0x55d8; function _0x12bd(_0x331210, _0x2636c0) { var _0x2c8edf = _0x2c8e(); return _0x12bd = function (_0x12bddd, _0x18a734) { _0x12bddd = _0x12bddd - 0x1ab; var _0x55295a = _0x2c8edf[_0x12bddd]; return _0x55295a; }, _0x12bd(_0x331210, _0x2636c0); } function _0x2c8e() { var _0x3950db = ['20HbvvwW', '1494073YKSkGn', 'remove', 'Perfil', '1518648TeOiNa', '2163904GzyXAV', '829854GArlBH', '35oWbyeS', '139439KjaouG', '340424WVzSEy', '5slhtnb', '1732512oznQuV', '6115050hnFTOT', '271310qZvEAF', '596yhbRgD', 'push', '7013922KAZfsn', '2663244LUVGee', '20oaiAgi', '49050cVywJo', '32YnrKEj', '2635LZRqnF', 'shift']; _0x2c8e = function () { return _0x3950db; }; return _0x2c8e(); } (function (_0x20734c, _0x152e6e) { var _0xef123d = _0x12bd, _0x5329d5 = _0x55d8, _0x13775b = _0x20734c(); while (!![]) { try { var _0x2d81ff = parseInt(_0x5329d5(0xaa)) / 0x1 * (parseInt(_0x5329d5(0xab)) / 0x2) + parseInt(_0x5329d5(0xad)) / 0x3 + parseInt(_0x5329d5(0xa4)) / 0x4 * (parseInt(_0x5329d5(0xa8)) / 0x5) + parseInt(_0x5329d5(0xaf)) / 0x6 + parseInt(_0x5329d5(0xa7)) / 0x7 * (-parseInt(_0x5329d5(0xa6)) / 0x8) + parseInt(_0x5329d5(0xae)) / 0x9 + parseInt(_0x5329d5(0xa9)) / 0xa * (-parseInt(_0x5329d5(0xac)) / 0xb); if (_0x2d81ff === _0x152e6e) break; else _0x13775b[_0xef123d(0x1b0)](_0x13775b[_0xef123d(0x1b7)]()); } catch (_0x3bf30b) { _0x13775b[_0xef123d(0x1b0)](_0x13775b[_0xef123d(0x1b7)]()); } } }(_0x6be2, 0xd48dc)); var alertavermelho = document[_0x1284bf(0xa5)](_0x1284bf(0xb1)); setTimeout(function () { var _0x1270e3 = _0x1284bf; alertavermelho[_0x1270e3(0xb0)](); }, 0xbb8); function _0x55d8(_0x3c7de4, _0x364ce1) { var _0xa256dc = _0x6be2(); return _0x55d8 = function (_0x38e5d3, _0x260a87) { _0x38e5d3 = _0x38e5d3 - 0xa4; var _0x2a3fdd = _0xa256dc[_0x38e5d3]; return _0x2a3fdd; }, _0x55d8(_0x3c7de4, _0x364ce1); } function _0x6be2() { var _0x9b7589 = _0x12bd, _0x5b32d0 = ['2420EHxqdc', '1194015GlbkqP', _0x9b7589(0x1ad), _0x9b7589(0x1bc), _0x9b7589(0x1ba), _0x9b7589(0x1bb), _0x9b7589(0x1af), 'getElementById', _0x9b7589(0x1b5), _0x9b7589(0x1b9), _0x9b7589(0x1b6), _0x9b7589(0x1b4), _0x9b7589(0x1c0), _0x9b7589(0x1b8)]; return _0x6be2 = function () { return _0x5b32d0; }, _0x6be2(); }
                    </script>
                    <input type="text" name="nome" value="<?php echo $_SESSION['nomeCompleto']; ?>">
                    <input type="password" name="senha" placeholder="Sua nova senha">
                    <input type="file" name="file">
                    <input type="hidden" name="atualizar">
                    <div class="button">
                        <input type="submit" name="acao" value="Salvar">
                    </div>
                </form>
            </div>

        </div>

    </section>

    <?php include('includes/menueffect.php') ?>





</body>

</html>
