<?php ob_start(); ?>

<div class="container-fluid">
	
	
	
		<div class="col-md-6 col-sm-6 col-xs-6">
			<address>
				<strong>entreprise Truc</strong>
				<br/>
				30, avenue des choses
				<br/>
				Cachan, 94230 Cedex 06
				<abbr title="téléphone">Tél.</abbr> 0676465898
			</address>
			
			<address>
				<strong>Notre email</strong>
				<br>
				<a href="mailto:#">contact@truc.com</a>
			</address>
		</div>
		
		<div class="col-md-6 col-sm-6 col-xs-6">
		
			<div class="form-group">
				<label class="control-label">Login</label>
					<div class="input-group">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
						</div>
						<input type="text" class="form-control" placeholder="Identifiant">
					</div>
			</div>
		
			<div class="form-group">
				<label class="control-label">Mot de passe</label>
					<div class="input-group">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-check"></span>
						</div>
						<input type="text" class="form-control" placeholder="mot de passe">
					</div>
			</div>
		
			<div class="checkbox-inline">
				<label><input type="checkbox" value="">Se souvenir de moi</label>
			</div>
			
			<div class="form-group">
				<label class="control-label">Email</label>
					<div class="input-group">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-envelope"></span>
						</div>
						<input type="text" class="form-control" placeholder=".........@...........">
					</div>
			</div>
			
			<div class="form-group">
				<label class="radio-inline">
					<input type="radio"> Fille </label>
				<label class="radio-inline">
					<input type="radio"> Garçon </label>
			</div>
			
			<div class="form-group">
				<label class="control-label">Commentaire</label>
					<div class="input-group">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-pencil"></span>
						</div>
						<textarea class="form-control" rows="3" placeholder="maximum 200 caractères"></textarea>
					</div>
			</div>
			
			<div class="form-action">
				<button type="button" class="btn btn-primary">Envoyer</button>
				<button type="button">Annuler</button>
			</div>
		
		</div>
    
 <?php $header = ob_get_clean(); ?>