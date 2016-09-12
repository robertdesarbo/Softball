@extends('layouts.app')

@section('pageName')
	Welcome
@stop

@section('content')
	<h2>Upcoming Games</h2>

	<hr>

	<section id="cd-timeline" class="cd-container">

		@if( count( $schedule ) > 0 )
			
			@foreach ($schedule as $game_number => $game )

				<div class="cd-timeline-block">

					@if(! is_null( $game->score_recored_time ) 
						&& (( in_array( $game->home_team_id, $my_teams_listing_by_team_id ) && $game->home_team_score >= $game->away_team_id )
						||  ( in_array( $game->away_team_id, $my_teams_listing_by_team_id ) && $game->away_team_id >= $game->away_team_id )
						   )
					)
						<div class="cd-timeline-img cd-picture won">
							<i class="fa fa-trophy fa-2x" aria-hidden="true"></i>
						</div>
					@elseif(! is_null( $game->score_recored_time ) 
							&& (( in_array( $game->home_team_id, $my_teams_listing_by_team_id ) && $game->home_team_score < $game->away_team_id )
							||  ( in_array( $game->away_team_id, $my_teams_listing_by_team_id ) && $game->away_team_id < $game->away_team_id )
							   )
					)
						<div class="cd-timeline-img cd-picture lost">
							<i class="fa fa-remove fa-2x" aria-hidden="true"></i>
						</div>
					@elseif(! is_null( $game->score_recored_time ) && in_array( $game->home_team_id, $my_teams_listing_by_team_id ) && $game->home_team_score == $game->away_team_id )
					)
						<div class="cd-timeline-img cd-picture won">
							<i class="fa fa-balance-scale fa-2x" aria-hidden="true"></i>
						</div>
					@else
						<div class="cd-timeline-img cd-picture pending">
							<i class="fa fa-calendar-o fa-2x" aria-hidden="true"></i>
						</div>
					@endif

					<div class="cd-timeline-content">
						

						@if( is_null( $game->score_recored_time ) )
							<h2>{{ $game->home_team->name }} vs. {{ $game->away_team->name }}</h2>
							<p>{{ $game->game_time->format('g a') }} game at {{ $game->field->name }}</p>
				
							<p>
								@if( $game->field->alcohol_allowed == 1 )
									Alcohol is <sttrong>ALLOWED</sttrong>
								@else
									Alcohol is <sttrong>NOT ALLOWED</sttrong>
								@endif
							</p>

							<p>
								@if( $game->field->pets_allowed == 1 )
									Pets are <sttrong>ALLOWED</sttrong>
								@else
									Pets are <sttrong>NOT ALLOWED</sttrong>
								@endif
							</p>
						@else
							<h2>{{ $game->home_team->name }} ( {{ $game->home_team_score }} ) to {{ $game->away_team->name }} ( {{ $game->away_team_score }} ) </h2>
							<p>Game was {{ $game->game_time->format('ga') }} at {{ $game->field->name }}</p>
						@endif

						<span class="cd-date">{{ $game->game_time->format('D M. jS') }}</span>
					</div>
				</div> <!-- cd-timeline-block -->

			@endforeach

		@else

			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-picture">
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-picture.svg" alt="Picture">
				</div> <!-- cd-timeline-img -->

				<div class="cd-timeline-content">
					<h2>Upcoming</h2>
					<p>You have no upcoming games!</p>
					<span class="cd-date">Today</span>
				</div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->

		@endif
	</section>


@stop

@section('scripts')

	<script>

	jQuery(document).ready(function($){

		var $timeline_block = $('.cd-timeline-block');

		//hide timeline blocks which are outside the viewport
		$timeline_block.each(function(){
			if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
				$(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
			}
		});

		//on scolling, show/animate timeline blocks when enter the viewport
		$(window).on('scroll', function(){
			$timeline_block.each(function(){
				if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
					$(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
				}
			});
		});
	});

	</script>
@stop
