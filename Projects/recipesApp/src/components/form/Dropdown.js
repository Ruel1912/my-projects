import React, { useState } from 'react';
import { getCuisine, getMealType } from '../../helpers/formatter';


function getTranslateValue(name, value) {
  switch (name) {
    case 'cuisine':
      return getCuisine(value);
    case 'meal-type':
      return getMealType(value);
    default: return value;
  }
}

const Dropdown = ({ title, options, name, handleSelect }) => {
  const [isOpen, setIsOpen] = useState(false);
  const [selectedOption, setSelectedOption] = useState(null);

  const toggleDropdown = () => {
    setIsOpen(!isOpen);
  };
  
  const handleSelectOption = (option) => {
    setSelectedOption(getTranslateValue(name, option));
    toggleDropdown();
    handleSelect(option);
  };

  return (
    <div className="custom-dropdown" data-name={name}>
      <div className="dropdown-header" onClick={toggleDropdown}>
        <span>{selectedOption ? selectedOption : title || 'Select'}</span>
        <img src={isOpen ? '/images/icon/arrow_up.svg' : '/images/icon/arrow_down.svg'} alt={isOpen ? '&#9650;' : '&#9660;'} />
      </div>
      {isOpen && (
        <div className="dropdown-options">
          <div className='dropdown-option' onClick={() => handleSelectOption(title)}>{title}</div>
          {options.map((option) => (
            <div
              key={option}
              className="dropdown-option"
              onClick={() => handleSelectOption(option)}
            >
              {getTranslateValue(name, option)}
            </div>
          ))}
        </div>
      )}
    </div>
  );
};

export default Dropdown;