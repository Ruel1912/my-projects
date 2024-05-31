import { Link } from "react-router-dom";

export function generatePageLinks(total, skip, limit) {
  const links = [];

  const totalPages = Math.ceil(total / limit);
  const currentPage = Math.ceil(skip / limit) + 1;

  // Выводим ссылку на предыдущую страницу
  links.push(
    <Link key="prev" to={`/recipes/${(currentPage - 2) * limit}/${limit}`} className={currentPage === 1 ? "disabled" : ''}>
      <img src="/images/icon/back.svg" alt="<" />
    </Link>
  );

  // Выводим первую страницу
  links.push(
    <Link key="1" to='/' className={currentPage === 1 ? 'active' : ''} >1</Link>
  );


  // Выводим "..."
  if (currentPage > 4) {
    links.push(
      <span key="start-ellipsis" className="ellipsis">
        <img src="/images/icon/dots.svg" alt="..." />
      </span>
    );
  }

  // Выводим страницы в центре
  let startPage = Math.max(2, currentPage - 2);
  let endPage = Math.min(totalPages - 1, currentPage + 2);

  for (let i = startPage; i <= endPage; i++) {
    links.push(
      <Link key={i} to={`/recipes/${(i - 1) * limit}/${limit}`} className={i === currentPage ? 'active' : ''}>
        {i}
      </Link>
    );
  }

  // Выводим "..."
  if (currentPage < totalPages - 3) {
    links.push(
      <span key="end-ellipsis" className="ellipsis">
        <img src="/images/icon/dots.svg" alt="..." />
      </span>
    );
  }

  // Выводим последнюю страницу
  links.push(
    <Link key={totalPages} to={`/recipes/${(totalPages - 1) * limit}/${limit}`} className={currentPage === totalPages ? "active" : ''}>{totalPages}</Link>
  );

  // Выводим ссылку "next"
  links.push(
    <Link key="next" to={`/recipes/${currentPage * limit}/${limit}`} className={currentPage === totalPages ? "disabled" : ''}>
      <img src="/images/icon/next.svg" alt=">" />
    </Link>
  );

  return links;
};