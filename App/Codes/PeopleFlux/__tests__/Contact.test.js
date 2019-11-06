import React from 'react'
import Contact from '../Components/Contact'
import renderer from 'react-test-renderer'

it('Test du formulaire de contact ',()=>{

  let ContactData = renderer.create(<Contact/>).getInstance();
  ContactData.setState({mail:"peopleflux@gmail.com"})


  expect(ContactData._isMailCorrect()).toEqual(true)

})
