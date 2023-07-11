<!DOCTYPE html>
<html>

<head>
	<?php include('includes/metatags.php') ?>
	<link href="<?php echo INCLUDE_PATH_STATIC ?>estilos/comunidade.css" rel="stylesheet">

</head>

<body>

	<section class="main-feed">
		<?php
		include('includes/sidebar.php');
		?>
		<div class="feed">
			<div class="comunidade">
				<div class="container-comunidade">
					<h4>Amigos</h4>
					<div class="container-comunidade-wraper">
						<?php

						foreach (\Sistema\Models\ComunidadeModel::listarAmigos() as $key => $value) {
							?>
							<div class="container-comunidade-single">
								<div class="img-comunidade-user-single">
									<?php if ($value['img'] == '') { ?>
										<img src="<?php echo INCLUDE_PATH_STATIC ?>images/avatar.png" />
									<?php } else { ?>
										<img src="<?php echo INCLUDE_PATH ?>images/<?php echo $value['img'] ?>" />

									<?php } ?>
								</div>
								<div class="friends-info-comunidade-user-single">
									<h2>
										<?php echo $value['nome']; ?>
									</h2>
									<p>
										<?php echo $value['email']; ?>
									</p>
								</div>

							</div>

						<?php } ?>
					</div>
				</div>
				<br />

				<div class="container-comunidade">
					<h4>Comunidade</h4>
					<div class="container-comunidade-wraper">

						<?php

						$comunidade = \Sistema\Models\ComunidadeModel::listarComunidade();
						foreach ($comunidade as $key => $value) {
							//SISTEMA DE IDENTIFICAÇÃO DE AMIZADE
							$pdo = \Sistema\MySql::connect();
							$verificaAmizade = $pdo->prepare("SELECT * FROM amizades WHERE (enviou = ? AND recebeu = ? AND status = 1) OR (enviou = ? AND recebeu = ? AND status = 1)");
							$verificaAmizade->execute(array($value['id'], $_SESSION['id'], $_SESSION['id'], $value['id']));

							if ($verificaAmizade->rowCount() == 1) {
								//JÁ SÃO AMIGOS NÃO PRECISA LISTAR
								continue;
							}
							//TERMINA O IDENTIFICADOR DE AMIZADE
						
							if ($value['id'] == $_SESSION['id']) {
								continue;
							}

							?>

							<div class="container-comunidade-single">
								<div class="img-comunidade-user-single">
									<img src="<?php echo INCLUDE_PATH_STATIC ?>images/avatar.png" />
								</div>
								<div class="info-comunidade-user-single">
									<h2>
										<?php echo $value['nome']; ?>
									</h2>
									<p>
										<?php echo $value['email']; ?>
									</p>
									<div class="btn-solicitar-amizade">

										<?php
										if (\Sistema\Models\ComunidadeModel::existePedidoAmizade($value['id'])) {
											?>

											<a
												href="<?php echo INCLUDE_PATH ?>comunidade?solicitarAmizade=<?php echo $value['id']; ?>">Solicitar
												Amizade</a>
										<?php } else { ?>
											<a href="javascript:void(0)" style="border-color:#16c208;color:#16c208;">Solicitação
												pendente</a>
										<?php } ?>
									</div>
								</div>

							</div>
						<?php } ?>
					</div>
				</div>
			</div><!--feed-->
	</section>

	<?php include('includes/menueffect.php') ?>

	<script src="<?php echo INCLUDE_PATH_STATIC ?>js/toastr.js"></script>
	<script>
		function _0x5e9a(_0x3b0914, _0x2f21dc) { var _0x3751ed = _0xce6c(); return _0x5e9a = function (_0x3ce6e9, _0x27c6f5) { _0x3ce6e9 = _0x3ce6e9 - (0x1d88 + 0x242d + -0x414a); var _0xe90838 = _0x3751ed[_0x3ce6e9]; return _0xe90838; }, _0x5e9a(_0x3b0914, _0x2f21dc); } function _0xce6c() { var _0x4d0148 = ['2000', '3NQCLdM', 'options', 'linear', '803160SPjBmA', '30556uLBESI', '500', '1511258lullwy', '1fMAmZU', '1000', 'toast-top-', '27144DzZNKY', 'fadeOut', '1261064AfEEwf', '269350yzqsmC', '140vwNxCD', '515JwFYBY', '676181CrWqtI', 'right', 'swing', 'fadeIn']; _0xce6c = function () { return _0x4d0148; }; return _0xce6c(); } var _0x4a8fb1 = _0x5e9a; (function (_0xb3bbe2, _0x28204f) { var _0x34a0ca = _0x5e9a, _0x120054 = _0xb3bbe2(); while (!![]) { try { var _0x2d0929 = parseInt(_0x34a0ca(0x70)) / (-0x215 + -0xb14 + -0x151 * -0xa) * (parseInt(_0x34a0ca(0x76)) / (0x14fe + 0x2 * 0x1162 + -0x1 * 0x37c0)) + -parseInt(_0x34a0ca(0x7e)) / (-0x1 * 0x81a + 0x2ad + 0x570) * (parseInt(_0x34a0ca(0x6d)) / (-0x1ebd + 0x59b + -0x6f * -0x3a)) + -parseInt(_0x34a0ca(0x78)) / (-0x3 * 0x11b + -0x137c + 0x16d2) * (parseInt(_0x34a0ca(0x73)) / (0x3bb * 0x3 + -0x1fed + 0x14c2)) + -parseInt(_0x34a0ca(0x6f)) / (-0x335 * 0x3 + -0xa61 * -0x2 + 0x58e * -0x2) + -parseInt(_0x34a0ca(0x75)) / (-0x134c + -0x20e6 + 0x343a) + parseInt(_0x34a0ca(0x6c)) / (0x87 * -0x5 + -0x349 * -0x3 + -0x265 * 0x3) + parseInt(_0x34a0ca(0x77)) / (0x1fc9 + -0x1a67 + -0x156 * 0x4) * (parseInt(_0x34a0ca(0x79)) / (-0x132c + 0x273 + 0x10c4)); if (_0x2d0929 === _0x28204f) break; else _0x120054['push'](_0x120054['shift']()); } catch (_0xaf10b8) { _0x120054['push'](_0x120054['shift']()); } } }(_0xce6c, 0x245b0 + -0x1 * -0x54092 + -0x1 * 0x3e707), toastr[_0x4a8fb1(0x7f)] = toastr[_0x4a8fb1(0x7f)] = { 'closeButton': !![], 'debug': ![], 'newestOnTop': ![], 'progressBar': !![], 'positionClass': _0x4a8fb1(0x72) + _0x4a8fb1(0x7a), 'preventDuplicates': !![], 'onclick': null, 'showDuration': _0x4a8fb1(0x6e), 'hideDuration': _0x4a8fb1(0x6e), 'timeOut': _0x4a8fb1(0x7d), 'extendedTimeOut': _0x4a8fb1(0x71), 'showEasing': _0x4a8fb1(0x7b), 'hideEasing': _0x4a8fb1(0x6b), 'showMethod': _0x4a8fb1(0x7c), 'hideMethod': _0x4a8fb1(0x74) });
	</script>

</body>


</html>
