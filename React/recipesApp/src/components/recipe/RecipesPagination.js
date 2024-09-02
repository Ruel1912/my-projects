import React from 'react';
import { generatePageLinks } from '../../helpers/genereratePageLinks';

function RecipesPagination({ total, skip, limit }) {

  return (
    <div className="pagination">
      {generatePageLinks(total, skip, limit)}
    </div>
  );

}

export default RecipesPagination;
