const blogs = [
  {
    id: "1",
    title: "The importance of being authentic",
    img: "images/authentic.png",
    snippet:
      "In today's world we are exposed to tons of marketing appeals : social media , new beauty standards ...",
      link: "authenticity.php"
  },
  {
    id: "2",
    title: "Burnout : A slow killer?",
    img: "images/burnout.jpeg",
    snippet:
      "Do you feel stressed all the time ? Are you experiencing lack of focus at work with an extreme feeling ...",
      link: "burnout.php"
  },
  {
    id: "3",
    title: "Effective job search",
    img: "images/job.jpeg",
    snippet:
      "One of the most critical moments in life is searching for a job , whether you are a fresh graduate ...",
    link: "effective_job_search.php"

  },
  {
    id: "4",
    title: "The power of first impression",
    img: "images/first.jpeg",
    snippet:
      "Whether it is in a job interview, engaging with a new customer, forging new friendships or simply going on ...",
      link: "first_impression.php"
  },
  {
    id: "5",
    title: "Emotional intelligence",
    img: "images/emotional.png",
    snippet:
      "The concept of emotional intelligence is considered new as the first discussions around it have started only ...",
      link: "emotional_intelligence.php"
  },
  {
    id: "6",
    title: "Tips for new joiners",
    img: "images/welcome.png",
    snippet:
      "If you are a fresh graduate or a new joiner at work this article is for you. You probably have made it ...",
      link: "new_joiners.php"
  },
  {
    id: "7",
    title: "Take care of your mental health",
    img: "images/mental.png",
    snippet:
      "Working from the comfort of your own home might seem a paradise set up with avoiding traffic, spending ...",
      link: "mental_health.php"
  },
];

const blogwrap = document.getElementById("blogwrapper");

const blogSetter = () => {

  blogs.sort((a,b) => 0.5 - Math.random());


  const result = blogs.map(
    (blog) =>
      `
	<div class="animate-box singleBlog">
	<article class="article-entry">
		<a href="${blog.link}" class="blog-img" style="background-image: url(${blog.img});"></a>
		<div class="desc">
			<h2><a href="${blog.link}">${blog.title}
				</a></h2>
			<p>${blog.snippet}</p>
		</div>
		<div class="admin">
			<p><span><i class="icon-user2"></i> by: Biba Dridi</span> <span class="day"><i class="icon-calendar"></i> 08 March 2022</span></p>
		</div>
	</article>
</div>
	`
  );

  blogwrap.innerHTML = result;
};

blogSetter();
