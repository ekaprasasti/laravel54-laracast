          <div class="blog-post">
						<h2 class="blog-post-title">
							<a href="/posts/{{ $post->id }}">
								{{ $post->title }}
							</a>
						</h2>
						<p class="blog-post-meta">
							{{ $post->created_at->toFormattedDateString() }}
						</p>

						{{ $post->body }}

          </div><!-- /.blog-post -->
