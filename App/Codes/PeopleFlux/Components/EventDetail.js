import React from 'react'
import { StyleSheet, View, Text, TouchableOpacity } from 'react-native'
import eventData from '../Helpers/EventData'
import {KeyboardAwareScrollView} from 'react-native-keyboard-aware-scrollview'
import { connect } from 'react-redux'

import Icon from 'react-native-vector-icons/Foundation'





class EventDetail extends React.Component {

  constructor(props) {
    super(props)
    this.state = {
      selectedLieu: null,
    }
  }


  render(){
    const name = this.props.navigation.state.params.name
    const date = this.props.navigation.state.params.date
    const lieu = this.props.navigation.state.params.lieu
    const description = this.props.navigation.state.params.description

    _onPressButtonMap = () =>{
      this.props.navigation.navigate('Lieux')
      const action = { type: "SET_LIEU", value: name }
      this.props.dispatch(action)

    }


    return(
      <View style={styles.main_container}>
        <View style={styles.bordure_titre}>
          <Text style={styles.text_name}>{name}</Text>
          <View style={styles.info_bouton}>
            <View style={styles.date_lieu}>
              <Text style={styles.text_date}> le {date}</Text>
              <Text style={styles.text_lieu}> A {lieu}</Text>
            </View>
            <TouchableOpacity style={styles.bouton_map} onPress={()=> _onPressButtonMap(this)}>
              <Icon name="map" size={50} color="#3796B3" />
            </TouchableOpacity>
          </View>
        </View>
        <KeyboardAwareScrollView style={styles.bordure_description}>
          <Text style={styles.titre_description}>Description : </Text>
          <Text style={styles.text_description}>{description}</Text>
        </KeyboardAwareScrollView>
      </View>
    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531',
  },
  bordure_titre:{
    borderColor: '#ff5733',
    borderWidth: 2,
    marginTop: 20,
    marginLeft:6,
    marginRight:6,
    backgroundColor: '#4B4C56',
    borderRadius: 20,


  },
  bordure_description:{
    borderColor: '#ff5733',
    borderWidth: 2,
    marginTop: 10,
    marginLeft:6,
    marginRight:6,
    marginBottom: 5,
    backgroundColor: '#4B4C56',
    borderRadius:10,
  },
  titre_description:{
    color: '#ff5733',
    fontWeight: 'bold',
    marginTop: 15,
    marginLeft: 5
  },

  text_name:{
    fontWeight : 'bold',
    fontSize: 25,
    color: '#c70039',
    textAlign: 'center',
    marginTop: 15
  },
  date_lieu:{
    flexDirection: 'row'
  },
  text_date:{
    fontSize: 15,
    color: '#fff',
    marginTop: 10,
    marginLeft: 10,

  },
  text_lieu:{
    fontSize: 15,
    color: '#fff',
    marginTop: 5,
    marginLeft: 10

  },
  text_description:{
    marginTop: 15,
    marginBottom: 10,
    marginRight : 10,
    marginLeft: 10,
    color: '#fff'
  },
  info_bouton:{
    flexDirection: 'row',
    marginBottom: 5
  },
  date_lieu:{
  },
  bouton_map:{
    position: 'absolute',
    right: 30
  }

})
const mapStateToProps = (state) => {
  return{
    selectedLieu: state.selectedLieu
  }
}

export default connect(mapStateToProps)(EventDetail)
