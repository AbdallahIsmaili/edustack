@extends('layouts.application')

@section('title', 'EduStack - ' . $subject->name)


@section('content')

<h2>{{ strtoupper($subject->name) }}: </h2>
<p>
    > {{ strtolower($subject->description) }}
</p>

<section class="section">
	<div class="container">
		<div class="columns is-multiline">

			<div class="column is-12">

				<article class="columns is-multiline is-justify-content-center mb-6">
					<div class="column is-12">
						<div class="post-slider">
							<img loading="lazy" src="{{ asset('assets/images/post/post-6.jpg') }}" class="" alt="post-thumb">
						</div>
					</div>
					<div class="column is-10-desktop">
						<h3><a class="post-title" href="post-elements.html">Elements That You Can Use To Create A New Post On This
                        Template.</a></h3>
						<ul class="list-inline post-meta mb-4">
							<li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">John Doe</a>
							</li>
							<li class="list-inline-item">Date : March 15, 2020</li>
							<li class="list-inline-item">Categories : <a href="#!" class="ml-1">Photography </a>
							</li>
							<li class="list-inline-item">Tags : <a href="#!" class="ml-1">Photo </a> ,<a href="#!" class="ml-1">Image </a>
							</li>
						</ul>
						<p>Heading example Here is example of hedings. You can use this heading by following markdownify rules. For example: use # for heading 1 and use ###### for heading 6. Heading 1 Heading 2 Heading 3 Heading 4 Heading 5 Heading 6 Emphasis Emphasis, aka italics, with asterisks or underscores.</p> <a href="post-elements.html" class="btn btn-outline-primary">Continue Reading</a>
					</div>
				</article>
				
				<article class="columns is-multiline is-justify-content-center mb-6">
					<div class="column is-10-desktop">
						<h3><a class="post-title" href="post-details-2.html">Cheerful Loving Couple Bakers Drinking Coffee</a></h3>
						<ul class="list-inline post-meta mb-4">
							<li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">John Doe</a>
							</li>
							<li class="list-inline-item">Date : March 14, 2020</li>
							<li class="list-inline-item">Categories : <a href="#!" class="ml-1">Newyork city </a>
							</li>
							<li class="list-inline-item">Tags : <a href="#!" class="ml-1">City </a> ,<a href="#!" class="ml-1">Photo </a>
							</li>
						</ul>
						<p>It’s no secret that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available. However, the industry is fast becoming overccolumns is-multilineded, heaving with agencies offering similar services — on the surface, at least. Producing creative, fresh projects is the key to standing out.</p> <a href="post-details-2.html" class="btn btn-outline-primary">Continue Reading</a>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>

@endsection
